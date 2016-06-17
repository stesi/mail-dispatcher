<?php

namespace STeSI\Entity\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use STeSI\Entity\StesiMail as ChildStesiMail;
use STeSI\Entity\StesiMailQuery as ChildStesiMailQuery;
use STeSI\Entity\Map\StesiMailTableMap;

/**
 * Base class that represents a query for the 'stesi_mail' table.
 *
 * 
 *
 * @method     ChildStesiMailQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildStesiMailQuery orderByFrom($order = Criteria::ASC) Order by the _from column
 * @method     ChildStesiMailQuery orderByA($order = Criteria::ASC) Order by the a column
 * @method     ChildStesiMailQuery orderByCc($order = Criteria::ASC) Order by the cc column
 * @method     ChildStesiMailQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildStesiMailQuery orderByAttachment($order = Criteria::ASC) Order by the attachment column
 * @method     ChildStesiMailQuery orderByDeliveryStatus($order = Criteria::ASC) Order by the delivery_status column
 * @method     ChildStesiMailQuery orderByErrorMessage($order = Criteria::ASC) Order by the error_message column
 * @method     ChildStesiMailQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     ChildStesiMailQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildStesiMailQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildStesiMailQuery groupById() Group by the id column
 * @method     ChildStesiMailQuery groupByFrom() Group by the _from column
 * @method     ChildStesiMailQuery groupByA() Group by the a column
 * @method     ChildStesiMailQuery groupByCc() Group by the cc column
 * @method     ChildStesiMailQuery groupByContent() Group by the content column
 * @method     ChildStesiMailQuery groupByAttachment() Group by the attachment column
 * @method     ChildStesiMailQuery groupByDeliveryStatus() Group by the delivery_status column
 * @method     ChildStesiMailQuery groupByErrorMessage() Group by the error_message column
 * @method     ChildStesiMailQuery groupBySubject() Group by the subject column
 * @method     ChildStesiMailQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildStesiMailQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildStesiMailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStesiMailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStesiMailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStesiMailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStesiMailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStesiMailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStesiMail findOne(ConnectionInterface $con = null) Return the first ChildStesiMail matching the query
 * @method     ChildStesiMail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStesiMail matching the query, or a new ChildStesiMail object populated from the query conditions when no match is found
 *
 * @method     ChildStesiMail findOneById(int $id) Return the first ChildStesiMail filtered by the id column
 * @method     ChildStesiMail findOneByFrom(string $_from) Return the first ChildStesiMail filtered by the _from column
 * @method     ChildStesiMail findOneByA(string $a) Return the first ChildStesiMail filtered by the a column
 * @method     ChildStesiMail findOneByCc(string $cc) Return the first ChildStesiMail filtered by the cc column
 * @method     ChildStesiMail findOneByContent(string $content) Return the first ChildStesiMail filtered by the content column
 * @method     ChildStesiMail findOneByAttachment(string $attachment) Return the first ChildStesiMail filtered by the attachment column
 * @method     ChildStesiMail findOneByDeliveryStatus(int $delivery_status) Return the first ChildStesiMail filtered by the delivery_status column
 * @method     ChildStesiMail findOneByErrorMessage(string $error_message) Return the first ChildStesiMail filtered by the error_message column
 * @method     ChildStesiMail findOneBySubject(string $subject) Return the first ChildStesiMail filtered by the subject column
 * @method     ChildStesiMail findOneByCreatedAt(string $created_at) Return the first ChildStesiMail filtered by the created_at column
 * @method     ChildStesiMail findOneByUpdatedAt(string $updated_at) Return the first ChildStesiMail filtered by the updated_at column *

 * @method     ChildStesiMail requirePk($key, ConnectionInterface $con = null) Return the ChildStesiMail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOne(ConnectionInterface $con = null) Return the first ChildStesiMail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStesiMail requireOneById(int $id) Return the first ChildStesiMail filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByFrom(string $_from) Return the first ChildStesiMail filtered by the _from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByA(string $a) Return the first ChildStesiMail filtered by the a column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByCc(string $cc) Return the first ChildStesiMail filtered by the cc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByContent(string $content) Return the first ChildStesiMail filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByAttachment(string $attachment) Return the first ChildStesiMail filtered by the attachment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByDeliveryStatus(int $delivery_status) Return the first ChildStesiMail filtered by the delivery_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByErrorMessage(string $error_message) Return the first ChildStesiMail filtered by the error_message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneBySubject(string $subject) Return the first ChildStesiMail filtered by the subject column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByCreatedAt(string $created_at) Return the first ChildStesiMail filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStesiMail requireOneByUpdatedAt(string $updated_at) Return the first ChildStesiMail filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStesiMail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStesiMail objects based on current ModelCriteria
 * @method     ChildStesiMail[]|ObjectCollection findById(int $id) Return ChildStesiMail objects filtered by the id column
 * @method     ChildStesiMail[]|ObjectCollection findByFrom(string $_from) Return ChildStesiMail objects filtered by the _from column
 * @method     ChildStesiMail[]|ObjectCollection findByA(string $a) Return ChildStesiMail objects filtered by the a column
 * @method     ChildStesiMail[]|ObjectCollection findByCc(string $cc) Return ChildStesiMail objects filtered by the cc column
 * @method     ChildStesiMail[]|ObjectCollection findByContent(string $content) Return ChildStesiMail objects filtered by the content column
 * @method     ChildStesiMail[]|ObjectCollection findByAttachment(string $attachment) Return ChildStesiMail objects filtered by the attachment column
 * @method     ChildStesiMail[]|ObjectCollection findByDeliveryStatus(int $delivery_status) Return ChildStesiMail objects filtered by the delivery_status column
 * @method     ChildStesiMail[]|ObjectCollection findByErrorMessage(string $error_message) Return ChildStesiMail objects filtered by the error_message column
 * @method     ChildStesiMail[]|ObjectCollection findBySubject(string $subject) Return ChildStesiMail objects filtered by the subject column
 * @method     ChildStesiMail[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildStesiMail objects filtered by the created_at column
 * @method     ChildStesiMail[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildStesiMail objects filtered by the updated_at column
 * @method     ChildStesiMail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StesiMailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \STeSI\Entity\Base\StesiMailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\STeSI\\Entity\\StesiMail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStesiMailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStesiMailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStesiMailQuery) {
            return $criteria;
        }
        $query = new ChildStesiMailQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildStesiMail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StesiMailTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StesiMailTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildStesiMail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, _from, a, cc, content, attachment, delivery_status, error_message, subject, created_at, updated_at FROM stesi_mail WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildStesiMail $obj */
            $obj = new ChildStesiMail();
            $obj->hydrate($row);
            StesiMailTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildStesiMail|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StesiMailTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StesiMailTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the _from column
     *
     * Example usage:
     * <code>
     * $query->filterByFrom('fooValue');   // WHERE _from = 'fooValue'
     * $query->filterByFrom('%fooValue%'); // WHERE _from LIKE '%fooValue%'
     * </code>
     *
     * @param     string $from The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByFrom($from = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($from)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL__FROM, $from, $comparison);
    }

    /**
     * Filter the query on the a column
     *
     * Example usage:
     * <code>
     * $query->filterByA('fooValue');   // WHERE a = 'fooValue'
     * $query->filterByA('%fooValue%'); // WHERE a LIKE '%fooValue%'
     * </code>
     *
     * @param     string $a The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByA($a = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($a)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_A, $a, $comparison);
    }

    /**
     * Filter the query on the cc column
     *
     * Example usage:
     * <code>
     * $query->filterByCc('fooValue');   // WHERE cc = 'fooValue'
     * $query->filterByCc('%fooValue%'); // WHERE cc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByCc($cc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_CC, $cc, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the attachment column
     *
     * Example usage:
     * <code>
     * $query->filterByAttachment('fooValue');   // WHERE attachment = 'fooValue'
     * $query->filterByAttachment('%fooValue%'); // WHERE attachment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attachment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByAttachment($attachment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attachment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_ATTACHMENT, $attachment, $comparison);
    }

    /**
     * Filter the query on the delivery_status column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryStatus(1234); // WHERE delivery_status = 1234
     * $query->filterByDeliveryStatus(array(12, 34)); // WHERE delivery_status IN (12, 34)
     * $query->filterByDeliveryStatus(array('min' => 12)); // WHERE delivery_status > 12
     * </code>
     *
     * @param     mixed $deliveryStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByDeliveryStatus($deliveryStatus = null, $comparison = null)
    {
        if (is_array($deliveryStatus)) {
            $useMinMax = false;
            if (isset($deliveryStatus['min'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_DELIVERY_STATUS, $deliveryStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deliveryStatus['max'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_DELIVERY_STATUS, $deliveryStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_DELIVERY_STATUS, $deliveryStatus, $comparison);
    }

    /**
     * Filter the query on the error_message column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorMessage('fooValue');   // WHERE error_message = 'fooValue'
     * $query->filterByErrorMessage('%fooValue%'); // WHERE error_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByErrorMessage($errorMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorMessage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_ERROR_MESSAGE, $errorMessage, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(StesiMailTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StesiMailTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStesiMail $stesiMail Object to remove from the list of results
     *
     * @return $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function prune($stesiMail = null)
    {
        if ($stesiMail) {
            $this->addUsingAlias(StesiMailTableMap::COL_ID, $stesiMail->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the stesi_mail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StesiMailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StesiMailTableMap::clearInstancePool();
            StesiMailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StesiMailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StesiMailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            StesiMailTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            StesiMailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior
    
    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(StesiMailTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }
    
    /**
     * Order by update date desc
     *
     * @return     $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(StesiMailTableMap::COL_UPDATED_AT);
    }
    
    /**
     * Order by update date asc
     *
     * @return     $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(StesiMailTableMap::COL_UPDATED_AT);
    }
    
    /**
     * Order by create date desc
     *
     * @return     $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(StesiMailTableMap::COL_CREATED_AT);
    }
    
    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(StesiMailTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }
    
    /**
     * Order by create date asc
     *
     * @return     $this|ChildStesiMailQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(StesiMailTableMap::COL_CREATED_AT);
    }

} // StesiMailQuery
