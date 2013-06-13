<?php
/**
 * @author: Wojciech Iskra <wojciech.iskra@schibsted.pl>
 */

namespace Dashboard\Model\Dao;


class NewRelicDao extends AbstractDao {
    public function fetchRpmForNumberWidget(array $params = array()) {
        $rpm = 0;

        $params['beginDateTime'] = date('Y-m-d', strtotime('-1 minute')) . 'T' . date('H:i:s', strtotime('-1 minute')) . 'Z';
        $params['endDateTime'] = date('Y-m-d') . 'T' . date('H:i:s') . 'Z';

        $response = $this->request($this->getEndpointUrl(__FUNCTION__), $params);

        if (is_array($response) && isset($response[0])) {
            $rpm = $response[0]['requests_per_minute'];
        }

        return $rpm;
    }
}