<?php
namespace app\Repository\Task;

interface TaskInterface{

    public function index();

    public function create();

    public function store(array $data);

    public function show($id);

    public function edit($id);

    public function update($id, array $data);

    public function destroy($id);
}