<?php
namespace Koorochka\Sglass;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class CalculatorTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> LID string(2) optional
 * <li> DATE_CREATE datetime optional
 * <li> DATE_UPDATE datetime optional
 * <li> SORT int optional
 * <li> NAME string(256) mandatory
 * <li> PHONE string(256) mandatory
 * <li> EMAIL string(256) mandatory
 * <li> STUFF string(256) optional
 * <li> PRODUCT string(256) optional
 * <li> MESSAGE string optional
 * <li> FILE string(256) optional
 * <li> RESULT string optional
 * </ul>
 *
 * @package Bitrix\Calculator
 **/

class CalculatorTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'sglass_calculator';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('CALCULATOR_ENTITY_ID_FIELD'),
            ),
            'LID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateLid'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_LID_FIELD'),
            ),
            'DATE_CREATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('CALCULATOR_ENTITY_DATE_CREATE_FIELD'),
            ),
            'DATE_UPDATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('CALCULATOR_ENTITY_DATE_UPDATE_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('CALCULATOR_ENTITY_SORT_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_NAME_FIELD'),
            ),
            'PHONE' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validatePhone'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_PHONE_FIELD'),
            ),
            'EMAIL' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateEmail'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_EMAIL_FIELD'),
            ),
            'STUFF' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateStuff'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_STUFF_FIELD'),
            ),
            'PRODUCT' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateProduct'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_PRODUCT_FIELD'),
            ),
            'MESSAGE' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CALCULATOR_ENTITY_MESSAGE_FIELD'),
            ),
            'FILE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateFile'),
                'title' => Loc::getMessage('CALCULATOR_ENTITY_FILE_FIELD'),
            ),
            'RESULT' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('CALCULATOR_ENTITY_RESULT_FIELD'),
            ),
        );
    }
    /**
     * Returns validators for LID field.
     *
     * @return array
     */
    public static function validateLid()
    {
        return array(
            new Main\Entity\Validator\Length(null, 2),
        );
    }
    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
    /**
     * Returns validators for PHONE field.
     *
     * @return array
     */
    public static function validatePhone()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
    /**
     * Returns validators for EMAIL field.
     *
     * @return array
     */
    public static function validateEmail()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
    /**
     * Returns validators for STUFF field.
     *
     * @return array
     */
    public static function validateStuff()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
    /**
     * Returns validators for PRODUCT field.
     *
     * @return array
     */
    public static function validateProduct()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
    /**
     * Returns validators for FILE field.
     *
     * @return array
     */
    public static function validateFile()
    {
        return array(
            new Main\Entity\Validator\Length(null, 256),
        );
    }
}