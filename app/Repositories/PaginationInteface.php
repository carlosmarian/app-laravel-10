<?PHP

namespace App\Repositories;

interface PaginationInteface
{
    /**
     * @return stdClass[]
     */
    public function items() :array;
    public function total() : int;
    public function isFirstPage() : bool;
    public function isLastPage() : bool;
    public function currentPage() : int;
    public function getNumberNextPage() : int;
    public function getNumberPreviousPage() : int;
}
