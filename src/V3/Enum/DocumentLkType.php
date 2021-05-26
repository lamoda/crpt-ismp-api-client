<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Enum;

final class DocumentLkType
{
    public const SETS_AGGREGATION = 'SETS_AGGREGATION'; // Переагрегация. json
    public const SETS_AGGREGATION_CSV = 'SETS_AGGREGATION_CSV'; // Переагрегация. csv
    public const SETS_AGGREGATION_XML = 'SETS_AGGREGATION_XML'; // Переагрегация. xml
    public const REAGGREGATION_DOCUMENT = 'REAGGREGATION_DOCUMENT'; // Переагрегация. json
    public const REAGGREGATION_DOCUMENT_CSV = 'REAGGREGATION_DOCUMENT_CSV'; // Переагрегация. csv
    public const REAGGREGATION_DOCUMENT_XML = 'REAGGREGATION_DOCUMENT_XML'; // Переагрегация. xml
    public const LP_INTRODUCE_GOODS = 'LP_INTRODUCE_GOODS'; // Ввод в оборот. Производство РФ. json
    public const LP_SHIP_GOODS = 'LP_SHIP_GOODS'; // Отгрузка. json
    public const LP_SHIP_GOODS_CSV = 'LP_SHIP_GOODS_CSV'; // Отгрузка. csv
    public const LP_SHIP_GOODS_XML = 'LP_SHIP_GOODS_XML'; // Отгрузка. xml
    public const LP_INTRODUCE_GOODS_CSV = 'LP_INTRODUCE_GOODS_CSV'; // Ввод в оборот. Производство РФ. csv
    public const LP_INTRODUCE_GOODS_XML = 'LP_INTRODUCE_GOODS_XML'; // Ввод в оборот. Производство РФ. xml
    public const LP_ACCEPT_GOODS = 'LP_ACCEPT_GOODS'; // Приемка. json
    public const LP_ACCEPT_GOODS_XML = 'LP_ACCEPT_GOODS_XML'; // Приемка. xml
    public const LK_REMARK = 'LK_REMARK'; // Перемаркировка
    public const LK_REMARK_CSV = 'LK_REMARK_CSV'; // Перемаркировка. csv
    public const LK_REMARK_XML = 'LK_REMARK_XML'; // Перемаркировка. xml
    public const LK_RECEIPT = 'LK_RECEIPT'; // Вывод из оборота по чеку через личный кабинет. json
    public const LK_RECEIPT_XML = 'LK_RECEIPT_XML'; // Вывод из оборота по чеку через личный кабинет. xml
    public const LK_RECEIPT_CSV = 'LK_RECEIPT_CSV'; // Вывод из оборота по чеку через личный кабинет. csv
    public const LP_GOODS_IMPORT = 'LP_GOODS_IMPORT'; // Ввод в оборот. Импорт. json
    public const LP_GOODS_IMPORT_CSV = 'LP_GOODS_IMPORT_CSV'; // Ввод в оборот. Импорт. csv
    public const LP_GOODS_IMPORT_XML = 'LP_GOODS_IMPORT_XML'; // Ввод в оборот. Импорт. xml
    public const LP_CANCEL_SHIPMENT = 'LP_CANCEL_SHIPMENT'; // Отмена отгрузки. json
    public const LP_CANCEL_SHIPMENT_CSV = 'LP_CANCEL_SHIPMENT_CSV'; // Отмена отгрузки. csv
    public const LP_CANCEL_SHIPMENT_XML = 'LP_CANCEL_SHIPMENT_XML'; // Отмена отгрузки. xml
    public const LK_KM_CANCELLATION = 'LK_KM_CANCELLATION'; // Списание ненанесенных КИ. json
    public const LK_KM_CANCELLATION_CSV = 'LK_KM_CANCELLATION_CSV'; // Списание ненанесенных КИ. csv
    public const LK_KM_CANCELLATION_XML = 'LK_KM_CANCELLATION_XML'; // Списание ненанесенных КИ. xml
    public const LK_APPLIED_KM_CANCELLATION = 'LK_APPLIED_KM_CANCELLATION'; // Списание нанесенных КИ. json
    public const LK_APPLIED_KM_CANCELLATION_CSV = 'LK_APPLIED_KM_CANCELLATION_CSV'; // Списание нанесенных КИ. csv
    public const LK_APPLIED_KM_CANCELLATION_XML = 'LK_APPLIED_KM_CANCELLATION_XML'; // Списание нанесенных КИ. xml
    public const LK_CONTRACT_COMMISSIONING = 'LK_CONTRACT_COMMISSIONING'; // Ввод в оборот товара. Контракт. json
    public const LK_CONTRACT_COMMISSIONING_CSV = 'LK_CONTRACT_COMMISSIONING_CSV'; // Ввод в оборот товара. Контракт. csv
    public const LK_CONTRACT_COMMISSIONING_XML = 'LK_CONTRACT_COMMISSIONING_XML'; // Ввод в оборот товара. Контракт. xml
    public const LK_INDI_COMMISSIONING = 'LK_INDI_COMMISSIONING'; // Ввод в оборот товара. ФизЛицо. json
    public const LK_INDI_COMMISSIONING_CSV = 'LK_INDI_COMMISSIONING_CSV'; // Ввод в оборот товара. ФизЛицо. csv
    public const LK_INDI_COMMISSIONING_XML = 'LK_INDI_COMMISSIONING_XML'; // Ввод в оборот товара. ФизЛицо. xml
    public const LP_SHIP_RECEIPT = 'LP_SHIP_RECEIPT'; // Вывод отгрузкой. json
    public const LP_SHIP_RECEIPT_CSV = 'LP_SHIP_RECEIPT_CSV'; // Вывод отгрузкой. csv
    public const LP_SHIP_RECEIPT_XML = 'LP_SHIP_RECEIPT_XML'; // Вывод отгрузкой. xml
    public const OST_DESCRIPTION = 'OST_DESCRIPTION'; // Описание остатков товара. json
    public const OST_DESCRIPTION_CSV = 'OST_DESCRIPTION_CSV'; // Описание остатков товара. csv
    public const OST_DESCRIPTION_XML = 'OST_DESCRIPTION_XML'; // Описание остатков товара. xml
    public const CROSSBORDER = 'CROSSBORDER'; // Трансгран. json
    public const CROSSBORDER_CSV = 'CROSSBORDER_CSV'; // Трансгран. csv
    public const CROSSBORDER_XML = 'CROSSBORDER_XML'; // Трансгран. xml
    public const LP_INTRODUCE_OST = 'LP_INTRODUCE_OST'; // Ввод в оборот остатков. json
    public const LP_INTRODUCE_OST_CSV = 'LP_INTRODUCE_OST_CSV'; // Ввод в оборот остатков. csv
    public const LP_INTRODUCE_OST_XML = 'LP_INTRODUCE_OST_XML'; // Ввод в оборот остатков. xml
    public const LP_RETURN = 'LP_RETURN'; // Возврат в оборот. json
    public const LP_RETURN_CSV = 'LP_RETURN_CSV'; // Возврат в оборот. csv
    public const LP_RETURN_XML = 'LP_RETURN_XML'; // Возврат в оборот. xml
    public const LP_SHIP_GOODS_CROSSBORDER = 'LP_SHIP_GOODS_CROSSBORDER'; // Отгрузка при трансграничной торговли. json
    public const LP_SHIP_GOODS_CROSSBORDER_CSV = 'LP_SHIP_GOODS_CROSSBORDER_CSV'; // Отгрузка при трансграничной торговли. csv
    public const LP_SHIP_GOODS_CROSSBORDER_XML = 'LP_SHIP_GOODS_CROSSBORDER_XML'; // Отгрузка при трансграничной торговли. xml
    public const LP_CANCEL_SHIPMENT_CROSSBORDER = 'LP_CANCEL_SHIPMENT_CROSSBORDER'; // Отмена отгрузки при трансграничной торговли. Производство РФ. json
    public const LP_FTS_INTRODUCE = 'LP_FTS_INTRODUCE'; // Ввод в оборот. Импорт с ФТС. JSON (MANUAL)
    public const LP_FTS_INTRODUCE_CSV = 'LP_FTS_INTRODUCE_CSV'; // Ввод в оборот. Импорт с ФТС. CSV
    public const LP_FTS_INTRODUCE_XML = 'LP_FTS_INTRODUCE_XML'; // Ввод в оборот. Импорт с ФТС. XML
}
