<?php

namespace STeSI\Entity\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use STeSI\Entity\StesiMail;
use STeSI\Entity\StesiMailQuery;


/**
 * This class defines the structure of the 'stesi_mail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class StesiMailTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'STeSI.Entity.Map.StesiMailTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'stesi_mail';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\STeSI\\Entity\\StesiMail';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'STeSI.Entity.StesiMail';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'stesi_mail.id';

    /**
     * the column name for the _from field
     */
    const COL__FROM = 'stesi_mail._from';

    /**
     * the column name for the a field
     */
    const COL_A = 'stesi_mail.a';

    /**
     * the column name for the cc field
     */
    const COL_CC = 'stesi_mail.cc';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'stesi_mail.content';

    /**
     * the column name for the attachment field
     */
    const COL_ATTACHMENT = 'stesi_mail.attachment';

    /**
     * the column name for the delivery_status field
     */
    const COL_DELIVERY_STATUS = 'stesi_mail.delivery_status';

    /**
     * the column name for the error_message field
     */
    const COL_ERROR_MESSAGE = 'stesi_mail.error_message';

    /**
     * the column name for the subject field
     */
    const COL_SUBJECT = 'stesi_mail.subject';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'stesi_mail.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'stesi_mail.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'From', 'A', 'Cc', 'Content', 'Attachment', 'DeliveryStatus', 'ErrorMessage', 'Subject', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'from', 'a', 'cc', 'content', 'attachment', 'deliveryStatus', 'errorMessage', 'subject', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(StesiMailTableMap::COL_ID, StesiMailTableMap::COL__FROM, StesiMailTableMap::COL_A, StesiMailTableMap::COL_CC, StesiMailTableMap::COL_CONTENT, StesiMailTableMap::COL_ATTACHMENT, StesiMailTableMap::COL_DELIVERY_STATUS, StesiMailTableMap::COL_ERROR_MESSAGE, StesiMailTableMap::COL_SUBJECT, StesiMailTableMap::COL_CREATED_AT, StesiMailTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', '_from', 'a', 'cc', 'content', 'attachment', 'delivery_status', 'error_message', 'subject', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'From' => 1, 'A' => 2, 'Cc' => 3, 'Content' => 4, 'Attachment' => 5, 'DeliveryStatus' => 6, 'ErrorMessage' => 7, 'Subject' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'from' => 1, 'a' => 2, 'cc' => 3, 'content' => 4, 'attachment' => 5, 'deliveryStatus' => 6, 'errorMessage' => 7, 'subject' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
        self::TYPE_COLNAME       => array(StesiMailTableMap::COL_ID => 0, StesiMailTableMap::COL__FROM => 1, StesiMailTableMap::COL_A => 2, StesiMailTableMap::COL_CC => 3, StesiMailTableMap::COL_CONTENT => 4, StesiMailTableMap::COL_ATTACHMENT => 5, StesiMailTableMap::COL_DELIVERY_STATUS => 6, StesiMailTableMap::COL_ERROR_MESSAGE => 7, StesiMailTableMap::COL_SUBJECT => 8, StesiMailTableMap::COL_CREATED_AT => 9, StesiMailTableMap::COL_UPDATED_AT => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, '_from' => 1, 'a' => 2, 'cc' => 3, 'content' => 4, 'attachment' => 5, 'delivery_status' => 6, 'error_message' => 7, 'subject' => 8, 'created_at' => 9, 'updated_at' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('stesi_mail');
        $this->setPhpName('StesiMail');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\STeSI\\Entity\\StesiMail');
        $this->setPackage('STeSI.Entity');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('_from', 'From', 'VARCHAR', true, 255, null);
        $this->addColumn('a', 'A', 'VARCHAR', false, 512, null);
        $this->addColumn('cc', 'Cc', 'VARCHAR', false, 512, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('attachment', 'Attachment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('delivery_status', 'DeliveryStatus', 'TINYINT', false, null, 0);
        $this->addColumn('error_message', 'ErrorMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', false, 256, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? StesiMailTableMap::CLASS_DEFAULT : StesiMailTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (StesiMail object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = StesiMailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = StesiMailTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + StesiMailTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StesiMailTableMap::OM_CLASS;
            /** @var StesiMail $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            StesiMailTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = StesiMailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = StesiMailTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var StesiMail $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StesiMailTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(StesiMailTableMap::COL_ID);
            $criteria->addSelectColumn(StesiMailTableMap::COL__FROM);
            $criteria->addSelectColumn(StesiMailTableMap::COL_A);
            $criteria->addSelectColumn(StesiMailTableMap::COL_CC);
            $criteria->addSelectColumn(StesiMailTableMap::COL_CONTENT);
            $criteria->addSelectColumn(StesiMailTableMap::COL_ATTACHMENT);
            $criteria->addSelectColumn(StesiMailTableMap::COL_DELIVERY_STATUS);
            $criteria->addSelectColumn(StesiMailTableMap::COL_ERROR_MESSAGE);
            $criteria->addSelectColumn(StesiMailTableMap::COL_SUBJECT);
            $criteria->addSelectColumn(StesiMailTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(StesiMailTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '._from');
            $criteria->addSelectColumn($alias . '.a');
            $criteria->addSelectColumn($alias . '.cc');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.attachment');
            $criteria->addSelectColumn($alias . '.delivery_status');
            $criteria->addSelectColumn($alias . '.error_message');
            $criteria->addSelectColumn($alias . '.subject');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(StesiMailTableMap::DATABASE_NAME)->getTable(StesiMailTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(StesiMailTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(StesiMailTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new StesiMailTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a StesiMail or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or StesiMail object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StesiMailTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \STeSI\Entity\StesiMail) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StesiMailTableMap::DATABASE_NAME);
            $criteria->add(StesiMailTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = StesiMailQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            StesiMailTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                StesiMailTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the stesi_mail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return StesiMailQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a StesiMail or Criteria object.
     *
     * @param mixed               $criteria Criteria or StesiMail object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StesiMailTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from StesiMail object
        }

        if ($criteria->containsKey(StesiMailTableMap::COL_ID) && $criteria->keyContainsValue(StesiMailTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StesiMailTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = StesiMailQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // StesiMailTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
StesiMailTableMap::buildTableMap();
