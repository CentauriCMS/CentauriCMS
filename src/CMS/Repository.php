<?php
namespace Centauri\CMS;

class Repository
{
    /**
     * The name of the table for this repository.
     *
     * @var string
     */
    protected $table = "";

    /**
     * The eloquent class-instance for this repository.
     *
     * @var null|string
     */
    protected $eloquent = null;

    /**
     * This function returns the table name of this repository.
     *
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * This function sets the table name for this repository.
     *
     * @param string $table Table name for this repository.
     * 
     * @return void
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * This function returns the eloquent of this repository.
     *
     * @return string
     */
    public function getEloquent(): string
    {
        return $this->eloquent;
    }

    /**
     * This function sets the eloquent for this repository.
     *
     * @param object $eloquent Eloquent instance for this repository.
     * 
     * @return void
     */
    public function setEloquent(string $eloquent): void
    {
        $this->eloquent = $eloquent;
    }

    /**
     * This function returns by the defined eloquent and given uid the record.
     *
     * @param integer $uid The uid for the eloquent.
     * 
     * @return void
     */
    public function findByUid(int $uid, array $constraints = [])
    {
        $constraints["uid"] = $uid;

        return $this->getEloquent()::where($constraints)->first();
    }
}
