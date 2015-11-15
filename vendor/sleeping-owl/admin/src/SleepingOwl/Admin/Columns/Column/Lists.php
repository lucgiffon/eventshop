<?php namespace SleepingOwl\Admin\Columns\Column;

class Lists extends BaseColumn
{

	/**
	 * @param $instance
	 * @param int $totalCount
	 * @return string
	 */
	public function render($instance, $totalCount)
	{
		$list = $this->valueFromInstance($instance, $this->name);
		//$idslist = $this->valueFromInstance($instance, 'event.id');
		$content = [];
        //$i = 0;
		foreach ($list as $item)
		{
			//$content_li = $this->htmlBuilder->link('/admin/events?participant_id=' . $idslist[$i], $item);
            $content[] = $this->htmlBuilder->tag('li', [], $item );
            //$i++;
		}
		$content = $this->htmlBuilder->tag('ul', ['class' => 'list-unstyled'], implode('', $content));
		return parent::render($instance, $totalCount, $content);
	}

	public function isSortable()
	{
		return false;
	}

}