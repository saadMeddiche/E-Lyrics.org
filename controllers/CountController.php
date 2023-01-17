<?php
class CountController
{
    public function statistics()
    {
        $statistics = Count::count();
        return $statistics;
    }
}
