<?php
declare(strict_types = 1);

namespace App;

use App\Comparable\Integer;
use App\Factory\OutputFactory;

class Application
{
    /** @var OutputFactory */
    private $outputFactory;

    /**
     * Application constructor.
     *
     * @param OutputFactory $outputFactory
     */
    public function __construct(OutputFactory $outputFactory)
    {
        $this->outputFactory = $outputFactory;
    }

    public function run(): void
    {
        foreach (range(1, 100) as $step) {
            $output = $this->outputFactory->create(new Integer($step));
            $output->print();
        }
    }
}
