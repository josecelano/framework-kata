<?php

namespace JoseCelano\Framework\Domain;

interface SqlSpecification
{
    public function toSqlClauses();
}