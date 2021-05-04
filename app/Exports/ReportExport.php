<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\ResourceBooking;

class ReportExport implements WithMultipleSheets
{
    use Exportable;

    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new ResourcesSheet($this->startDate, $this->endDate);
        $sheets[] = new BranchesSheet($this->startDate, $this->endDate);
        $sheets[] = new CategoriesSheet($this->startDate, $this->endDate);

        $sheets[] = new UsersSheet($this->startDate, $this->endDate);
        $sheets[] = new UsersBranchesSheet($this->startDate, $this->endDate);
        $sheets[] = new UsersProgramsSheet($this->startDate, $this->endDate);

        return $sheets;
    }
}

class BranchesSheet implements FromQuery, WithTitle
{
    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ResourceBooking::whereBetween('start_time', [$this->startDate, $this->endDate])
            ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
            ->join('branches', 'branches.id', '=', 'resources.branch_id')
            ->selectRaw('resources.branch_id, branches.title_en, count(*) as total')
            ->groupBy('resources.branch_id')
            ->orderBy('total', 'DESC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Resources (Branches)';
    }
}

class ResourcesSheet implements FromQuery, WithTitle
{
    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ResourceBooking::whereBetween('start_time', [$this->startDate, $this->endDate])
            ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
            ->selectRaw('resource_id, resources.number, count(*) as total')
            ->groupBy('resource_id')
            ->orderBy('total', 'DESC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Resources';
    }
}

class CategoriesSheet implements FromQuery, WithTitle
{
    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ResourceBooking::whereBetween('start_time', [$this->startDate, $this->endDate])
            ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
            ->join('categories', 'categories.id', '=', 'resources.category_id')
            ->selectRaw('resources.category_id, categories.title_en, count(*) as total')
            ->groupBy('resources.category_id')
            ->orderBy('total', 'DESC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Resources (Categories)';
    }
}

class UsersSheet implements FromQuery, WithTitle
{
    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ResourceBooking::whereBetween('start_time', [$this->startDate, $this->endDate])
            ->join('users', 'users.id', '=', 'resource_bookings.user_id')
            ->selectRaw('user_id, users.name, count(*) as total')
            ->groupBy('user_id')
            ->orderBy('total', 'DESC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Users';
    }
}

class UsersBranchesSheet implements FromQuery, WithTitle
{
    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ResourceBooking::whereBetween('start_time', [$this->startDate, $this->endDate])
            ->join('resources', 'resources.id', '=', 'resource_bookings.resource_id')
            ->join('branches', 'branches.id', '=', 'resources.branch_id')
            ->selectRaw('resources.branch_id, branches.title_en, count(*) as total')
            ->groupBy('resources.branch_id')
            ->orderBy('total', 'DESC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Users (Branches)';
    }
}

class UsersProgramsSheet implements FromQuery, WithTitle
{
    protected $startDate, $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ResourceBooking::whereBetween('start_time', [$this->startDate, $this->endDate])
            ->join('users', 'users.id', '=', 'resource_bookings.user_id')
            ->join('programs', 'programs.id', '=', 'users.program_id')
            ->selectRaw('users.program_id, programs.title_en, count(*) as total')
            ->groupBy('users.program_id')
            ->orderBy('total', 'DESC');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Users (Programs)';
    }
}
