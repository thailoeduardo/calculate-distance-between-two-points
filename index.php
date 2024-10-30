<?php

/**
 * Class Point
 */
class Point
{
	private $x;
	private $y;

	public function __construct($x, $y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function distanceTo(Point $point)
	{
		return sqrt(pow($this->x - $point->x, 2) + pow($this->y - $point->y, 2));
	}

	public function getX()
	{
		return $this->x;
	}

	public function getY()
	{
		return $this->y;
	}
}

/**
 * Class Line
 */
class Line
{
	private $changed;
	private $length;
	private $start;
	private $end;

	public function __construct(Point $start, Point $end)
	{
		$this->start = $start;
		$this->end = $end;
		$this->changed = true;
	}

	public function setStart(Point $p)
	{
		$this->start = $p;
		$this->changed = true;
	}

	public function setEnd(Point $p)
	{
		$this->end = $p;
		$this->changed = true;
	}

	public function getStart()
	{
		return $this->start;
	}

	public function getEnd()
	{
		return $this->end;
	}

	public function getLength()
	{
		if ($this->changed) {
			$this->length = $this->start->distanceTo($this->end);
			$this->changed = false;
		}
		return $this->length;
	}
}

$start = new Point(0, 0);
$end = new Point(3, 4);
$line = new Line($start, $end);

echo "Line length: " . $line->getLength(); 

$line->setEnd(new Point(6, 8));
echo "\nUpdated line length: " . $line->getLength(); 
