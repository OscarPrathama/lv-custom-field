<?php
interface BaseController{
    /**
     * get all record
    */
    public function index();

    /**
     * show specific record
     */
    public function show();

    /**
     * show create view
    */
    public function create();

    /**
     * store record
    */
    public function store();

    /**
     * show specific record
    */
    public function edit();

    /**
     * update specific record
    */
    public function update();

    /**
     * delete specific record
    */
    public function destroy();

}
