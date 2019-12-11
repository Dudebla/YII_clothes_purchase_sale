<?php
 
class GoodsInventoryInformationController extends BaseController {

     public function actionIndex()
    {

         $keywords = Yii::app()->request->getParam('keywords');
        $keywords2 = Yii::app()->request->getParam('keywords2');


         $sql = "SELECT
                gm.goods_no,
                gm.goods_name,
                goods_type.type_name,
                gdjh.quantity - gdxs.quantity + gdth.quantity AS num
            FROM
                goods_message AS gm,
                (
                    SELECT
                        SUM(quantity) AS quantity,
                        detail_id AS goods_id
                    FROM
                        purchase
                    GROUP BY
                        detail_id
                ) AS gdjh,
                (
                    SELECT
                        SUM(quantity) AS quantity,
                        goods_id
                    FROM
                        sell_detail
                    GROUP BY
                        goods_id
                ) AS gdxs,
                (
                    SELECT
                        SUM(sd.quantity) AS quantity,
                        sd.goods_id
                    FROM
                        sell_detail AS sd,
                        sell_return AS sr
                    WHERE
                        sd.detail_id = sr.detail_id
                    GROUP BY
                        sd.goods_id
                ) AS gdth,
                goods_type
            WHERE
                gm.id = gdjh.goods_id
            AND gm.id = gdxs.goods_id
            AND gm.id = gdth.goods_id
            AND gm.type_id = goods_type.type_id
            AND gm.goods_no like '%$keywords%'";




        $bianhaochaxungoods = Yii::app()->db->createCommand($sql)->queryAll();





        $sql = "SELECT
                gm.goods_no,
                gm.goods_name,
                goods_type.type_name,
                gdjh.quantity - gdxs.quantity + gdth.quantity AS num
            FROM
                goods_message AS gm,
                (
                    SELECT
                        SUM(quantity) AS quantity,
                        detail_id AS goods_id
                    FROM
                        purchase
                    GROUP BY
                        detail_id
                ) AS gdjh,
                (
                    SELECT
                        SUM(quantity) AS quantity,
                        goods_id
                    FROM
                        sell_detail
                    GROUP BY
                        goods_id
                ) AS gdxs,
                (
                    SELECT
                        SUM(sd.quantity) AS quantity,
                        sd.goods_id
                    FROM
                        sell_detail AS sd,
                        sell_return AS sr
                    WHERE
                        sd.detail_id = sr.detail_id
                    GROUP BY
                        sd.goods_id
                ) AS gdth,
                goods_type
            WHERE
                gm.id = gdjh.goods_id
            AND gm.id = gdxs.goods_id
            AND gm.id = gdth.goods_id
            AND gm.type_id = goods_type.type_id
            AND gm.goods_name like '%$keywords2%'";

        $mingchengchaxungoods = Yii::app()->db->createCommand($sql)->queryAll();




        $this->render('index',["bianhaochaxungoods"=>$bianhaochaxungoods,"mingchengchaxungoods"=>$mingchengchaxungoods]);
    }
}
