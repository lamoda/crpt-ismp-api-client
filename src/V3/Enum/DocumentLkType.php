<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Enum;

final class DocumentLkType
{
    public const REAGGREGATION_DOCUMENT = 'reaggregation_document'; // Переагрегация. json
    public const REAGGREGATION_DOCUMENT_CSV = 'reaggregation_document_csv'; // Переагрегация. csv
    public const REAGGREGATION_DOCUMENT_XML = 'reaggregation_document_xml'; // Переагрегация. xml
    public const LP_INTRODUCE_GOODS = 'lp_introduce_goods'; // Ввод в оборот. Производство РФ. json
    public const LP_SHIP_GOODS = 'lp_ship_goods'; // Отгрузка. json
    public const LP_SHIP_GOODS_CSV = 'lp_ship_goods_csv'; // Отгрузка. csv
    public const LP_SHIP_GOODS_XML = 'lp_ship_goods_xml'; // Отгрузка. xml
    public const LP_INTRODUCE_GOODS_CSV = 'lp_introduce_goods_csv'; // Ввод в оборот. Производство РФ. csv
    public const LP_INTRODUCE_GOODS_XML = 'lp_introduce_goods_xml'; // Ввод в оборот. Производство РФ. xml
    public const LP_ACCEPT_GOODS = 'lp_accept_goods'; // Приемка. json
    public const LP_ACCEPT_GOODS_XML = 'lp_accept_goods_xml'; // Приемка. xml
    public const LK_REMARK = 'lk_remark'; // Перемаркировка
    public const LK_REMARK_CSV = 'lk_remark_csv'; // Перемаркировка. csv
    public const LK_REMARK_XML = 'lk_remark_xml'; // Перемаркировка. xml
    public const LK_RECEIPT = 'lk_receipt'; // Вывод из оборота по чеку через личный кабинет. json
    public const LK_RECEIPT_XML = 'lk_receipt_xml'; // Вывод из оборота по чеку через личный кабинет. xml
    public const LK_RECEIPT_CSV = 'lk_receipt_csv'; // Вывод из оборота по чеку через личный кабинет. csv
    public const LP_GOODS_IMPORT = 'lp_goods_import'; // Ввод в оборот. Импорт. json
    public const LP_GOODS_IMPORT_CSV = 'lp_goods_import_csv'; // Ввод в оборот. Импорт. csv
    public const LP_GOODS_IMPORT_XML = 'lp_goods_import_xml'; // Ввод в оборот. Импорт. xml
    public const LP_CANCEL_SHIPMENT = 'lp_cancel_shipment'; // Отмена отгрузки. json
    public const LP_CANCEL_SHIPMENT_CSV = 'lp_cancel_shipment_csv'; // Отмена отгрузки. csv
    public const LP_CANCEL_SHIPMENT_XML = 'lp_cancel_shipment_xml'; // Отмена отгрузки. xml
    public const LK_KM_CANCELLATION = 'lk_km_cancellation'; // Списание ненанесенных КИ. json
    public const LK_KM_CANCELLATION_CSV = 'lk_km_cancellation_csv'; // Списание ненанесенных КИ. csv
    public const LK_KM_CANCELLATION_XML = 'lk_km_cancellation_xml'; // Списание ненанесенных КИ. xml
    public const LK_APPLIED_KM_CANCELLATION = 'lk_applied_km_cancellation'; // Списание нанесенных КИ. json
    public const LK_APPLIED_KM_CANCELLATION_CSV = 'lk_applied_km_cancellation_csv'; // Списание нанесенных КИ. csv
    public const LK_APPLIED_KM_CANCELLATION_XML = 'lk_applied_km_cancellation_xml'; // Списание нанесенных КИ. xml
    public const LK_CONTRACT_COMMISSIONING = 'lk_contract_commissioning'; // Ввод в оборот товара. Контракт. json
    public const LK_CONTRACT_COMMISSIONING_CSV = 'lk_contract_commissioning_csv'; // Ввод в оборот товара. Контракт. csv
    public const LK_CONTRACT_COMMISSIONING_XML = 'lk_contract_commissioning_xml'; // Ввод в оборот товара. Контракт. xml
    public const LK_INDI_COMMISSIONING = 'lk_indi_commissioning'; // Ввод в оборот товара. ФизЛицо. json
    public const LK_INDI_COMMISSIONING_CSV = 'lk_indi_commissioning_csv'; // Ввод в оборот товара. ФизЛицо. csv
    public const LK_INDI_COMMISSIONING_XML = 'lk_indi_commissioning_xml'; // Ввод в оборот товара. ФизЛицо. xml
    public const LP_SHIP_RECEIPT = 'lp_ship_receipt'; // Вывод отгрузкой. json
    public const LP_SHIP_RECEIPT_CSV = 'lp_ship_receipt_csv'; // Вывод отгрузкой. csv
    public const LP_SHIP_RECEIPT_XML = 'lp_ship_receipt_xml'; // Вывод отгрузкой. xml
    public const OST_DESCRIPTION = 'ost_description'; // Описание остатков товара. json
    public const OST_DESCRIPTION_CSV = 'ost_description_csv'; // Описание остатков товара. csv
    public const OST_DESCRIPTION_XML = 'ost_description_xml'; // Описание остатков товара. xml
    public const CROSSBORDER = 'crossborder'; // Трансгран. json
    public const CROSSBORDER_CSV = 'crossborder_csv'; // Трансгран. csv
    public const CROSSBORDER_XML = 'crossborder_xml'; // Трансгран. xml
    public const LP_INTRODUCE_OST = 'lp_introduce_ost'; // Ввод в оборот остатков. json
    public const LP_INTRODUCE_OST_CSV = 'lp_introduce_ost_csv'; // Ввод в оборот остатков. csv
    public const LP_INTRODUCE_OST_XML = 'lp_introduce_ost_xml'; // Ввод в оборот остатков. xml
    public const LP_RETURN = 'lp_return'; // Возврат в оборот. json
    public const LP_RETURN_CSV = 'lp_return_csv'; // Возврат в оборот. csv
    public const LP_RETURN_XML = 'lp_return_xml'; // Возврат в оборот. xml
    public const LP_SHIP_GOODS_CROSSBORDER = 'lp_ship_goods_crossborder'; // Отгрузка при трансграничной торговли. json
    public const LP_SHIP_GOODS_CROSSBORDER_CSV = 'lp_ship_goods_crossborder_csv'; // Отгрузка при трансграничной торговли. csv
    public const LP_SHIP_GOODS_CROSSBORDER_XML = 'lp_ship_goods_crossborder_xml'; // Отгрузка при трансграничной торговли. xml
    public const LP_CANCEL_SHIPMENT_CROSSBORDER = 'lp_cancel_shipment_crossborder'; // Отмена отгрузки при трансграничной торговли. Производство РФ. json
}
