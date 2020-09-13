<?php
namespace Centauri\CMS\Repository;

class Repository
{
    /**
     * The eloquent class-instance for this repository.
     *
     * @var null|string
     */
    protected $eloquent = null;

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
     * @param string $eloquent Eloquent instance for this repository.
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

    /**
     * This function returns all, by the defined eloquent, records for this repository.
     *
     * @return void
     */
    public function findAll()
    {
        return $this->getEloquent()::get()->all();
    }
}
