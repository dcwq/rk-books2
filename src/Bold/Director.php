<?php

namespace Bold;

class Director
{
    public function build(ModelBuilderInterface $builder) : Model
    {
        $builder->createModel();

        return $builder->getModel();
    }
}
