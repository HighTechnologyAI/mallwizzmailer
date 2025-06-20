<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Campaign_complaintsController
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.4.4
 */

class Campaign_complaintsController extends Controller
{
    /**
     * @return array
     */
    public function accessRules()
    {
        return [
            // allow all authenticated users on all actions
            ['allow', 'users' => ['@']],
            // deny all rule.
            ['deny'],
        ];
    }

    /**
     * @param string $campaign_uid
     *
     * @return void
     * @throws CException
     */
    public function actionIndex($campaign_uid)
    {
        /** @var Campaign|null $campaign */
        $campaign = $this->loadCampaignByUid($campaign_uid);

        if (empty($campaign)) {
            $this->renderJson([
                'status'    => 'error',
                'error'     => t('api', 'The campaign does not exist!'),
            ], 404);
            return;
        }

        $perPage    = (int)request()->getQuery('per_page', 10);
        $page       = (int)request()->getQuery('page', 1);

        $maxPerPage = (int)hooks()->applyFilters('api_campaign_complaints_collection_max_records_per_page', 1000);
        $minPerPage = (int)hooks()->applyFilters('api_campaign_complaints_collection_min_records_per_page', 10);

        if ($perPage < $minPerPage) {
            $perPage = $minPerPage;
        }

        if ($perPage > $maxPerPage) {
            $perPage = $maxPerPage;
        }

        if ($page < 1) {
            $page = 1;
        }

        $data = [
            'count'        => null,
            'total_pages'  => null,
            'current_page' => null,
            'next_page'    => null,
            'prev_page'    => null,
            'records'      => [],
        ];

        $criteria = new CDbCriteria();
        $criteria->compare('t.campaign_id', (int)$campaign->campaign_id);

        /** @var CDbCriteria $criteria */
        $criteria = hooks()->applyFilters('api_campaign_complaints_collection_count_criteria', $criteria);

        $count = CampaignComplainLog::model()->count($criteria);

        if ($count == 0) {
            $this->renderJson([
                'status' => 'success',
                'data'   => $data,
            ]);
            return;
        }

        $totalPages = ceil($count / $perPage);

        $data['count']        = $count;
        $data['current_page'] = $page;
        $data['next_page']    = $page < $totalPages ? $page + 1 : null;
        $data['prev_page']    = $page > 1 ? $page - 1 : null;
        $data['total_pages']  = $totalPages;

        $criteria->order  = 't.log_id DESC';
        $criteria->limit  = $perPage;
        $criteria->offset = ($page - 1) * $perPage;

        /** @var CDbCriteria $criteria */
        $criteria = hooks()->applyFilters('api_campaign_complaints_collection_find_criteria', $criteria);

        $complains = CampaignComplainLog::model()->findAll($criteria);

        foreach ($complains as $complain) {
            $data['records'][] = hooks()->applyFilters('api_campaign_complaints_collection_record', [
                'message'     => $complain->message,
                'subscriber'  => [
                    'subscriber_uid' => $complain->subscriber->subscriber_uid,
                    'email'          => $complain->subscriber->getDisplayEmail(),
                ],
            ], $complain);
        }

        $this->renderJson([
            'status' => 'success',
            'data'   => hooks()->applyFilters('api_campaign_complaints_collection_data', $data),
        ]);
    }

    /**
     * @param string $campaign_uid
     *
     * @return Campaign|null
     */
    public function loadCampaignByUid(string $campaign_uid): ?Campaign
    {
        if (empty($campaign_uid)) {
            return null;
        }
        $criteria = new CDbCriteria();
        $criteria->compare('customer_id', (int)user()->getId());
        $criteria->compare('campaign_uid', $campaign_uid);

        /** @var Campaign|null $model */
        $model = Campaign::model()->find($criteria);

        return $model;
    }
}
