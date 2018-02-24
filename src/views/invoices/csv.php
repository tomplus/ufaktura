<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


print "#id,numer,profil,klient,data_wystawienia,data_sprzedazy,";
print "wartosc,data_platnosci,sposob_platnosci,data_dodania,data_modyfikacji";
print "nazwa,ilosc,jednostka,cena,";
print "nazwa,ilosc,jednostka,cena,";
print "nazwa,ilosc,jednostka,cena,";
print "\n";

foreach ($dataProvider->getModels() as $model) {

    $row = array($model->ivc_id,
                 $model->ivc_number,
                 $model->ivcPfl->pfl_name_1,
                 $model->ivcCln->cln_name_1,
                 $model->ivc_date_create,
                 $model->ivc_date_sale,
                 $model->ivc_value,
                 $model->ivc_date_payment,
                 $model->ivc_payment_method,
                 $model->ivc_ts_insert,
                 $model->ivc_ts_update,
                 $model->ivc_name,
                 $model->ivc_count,
                 $model->ivc_unit,
                 $model->ivc_price,
                 $model->ivc_name_2,
                 $model->ivc_count_2,
                 $model->ivc_unit_2,
                 $model->ivc_price_2,
                 $model->ivc_name_3,
                 $model->ivc_count_3,
                 $model->ivc_unit_3,
                 $model->ivc_price_3
    );

    foreach ($row as $col) {
        print str_replace(',','',$col);
        print ",";
    }
    print "\n";
}

?>
