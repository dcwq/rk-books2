<?php

namespace Bold\Book;

/**
 * Class BookRepository
 * @package Bold\Book
 */
class BookRepository extends RepositoryAbstract
{
    /**
     * @param array $params
     * @return array
     */
    public function search(array $params) : array
    {
        if ($params['name']) {
            $where = "where name like '{$params['name']}' AND ({$params['age']})";
        } else {
            $where = "where ({$params['age']})";
        }

        $query = "SELECT books.id,
            books.name,
            books.book_date,
            reviews.age,
            male_avg_age,
            female_avg_age 
            
            FROM books
            
            LEFT JOIN reviews
            ON reviews.book_id = books.id
          
            LEFT JOIN
            (SELECT book_id, AVG(CASE WHEN sex = 'm' THEN age END) AS male_avg_age FROM reviews
            INNER JOIN books ON books.id = reviews.book_id
            where ({$params['age']})
            GROUP BY book_id) AS male_avg_age
            ON male_avg_age.book_id = books.id

            LEFT JOIN
            (SELECT book_id, AVG(CASE WHEN sex = 'f' THEN age END) AS female_avg_age FROM reviews
            INNER JOIN books ON books.id = reviews.book_id
            where ({$params['age']})
            GROUP BY book_id) AS female_avg_age
            ON female_avg_age.book_id = books.id
            
            $where
            
            GROUP BY books.id";

        $sth = $this->persistence->prepare($query);
        $sth->execute();

        return $sth->fetchAll();
    }

}
