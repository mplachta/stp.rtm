<?php
/**
 * Base class for different widget types
 *
 * @author Konrad Turczynski <konrad.turczynski@schibsted.pl>
 */
namespace Dashboard\Model\Widget;

use Dashboard\Model\Dao\AbstractDao;

abstract class AbstractWidget {
    /**
     * Widget's identifier
     *
     * @var
     */
    protected $id;
    /**
     * Widget's custom parameters
     *
     * @var array
     */
    protected $params;

    /**
     * Dao object for concrete widget
     *
     * @var
     */
    protected $dao;

    /**
     * Constructor
     *
     * @param array $params Merged parameters from custom and default widget config
     */
    public function __construct(array $params) {
        $this->params = $params;
    }

    /**
     * Returns widget specific parameter
     *
     * @param string $paramName Parameter name.
     * @return mixed
     * @throws \Exception
     */
    public function getParam($paramName) {
        if (isset($this->params[$paramName])) {
            return $this->params[$paramName];
        } else {
            throw new \Exception('Invalid widget parameter: ' . $paramName);
        }
    }

    /**
     * Sets widget's dao
     *
     * @param AbstractDao $dao Concrete dao object
     */
    public function setDao(AbstractDao $dao) {
        $this->dao = $dao;
    }

    /**
     * Returns dao
     *
     * @return mixed
     */
    public function getDao() {
        return $this->dao;
    }

    /**
     * Sets widget identifier
     *
     * @param mixed $id Widget identifier
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Returns widget identifier
     *
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }
}
