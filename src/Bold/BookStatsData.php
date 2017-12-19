<?php

namespace Bold;

/**
 * Class BookStatsData
 * @package Bold
 */
class BookStatsData extends StatsDataAbstract
{
    /**
     * @param array $data
     * @param ModelBuilderInterface $builder
     * @param Director $director
     */
    public function setData(array $data, ModelBuilderInterface $builder, Director $director)
    {
        $items = [];

        foreach ($data as $item)
        {
            $newBook = ($director->build($builder));
            $newBook->setName($item['name']);
            $newBook->setBookDate($item['book_date']);
            $newBook->male_avg_age = $item['male_avg_age'];
            $newBook->female_avg_age = $item['female_avg_age'];

            $items[] = $newBook;
        }

        parent::setData($items);
    }

    /**
     * Add compatibility column
     * @param string $searchString
     */
    public function addCompatibilityColumn(string $searchString)
    {
        foreach ($this->data as &$dataItem)
        {
            similar_text(strtolower($dataItem->getName()), strtolower($searchString), $percent);
            $dataItem->compatibility = $percent;
        }

    }
}
