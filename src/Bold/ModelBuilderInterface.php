<?php

namespace Bold;

interface ModelBuilderInterface
{
    public function createModel();
    public function getModel(): Model;

}
