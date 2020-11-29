<?php

	$values = $_POST;
	if ((int)$values['vadaPrice'] > (int)$values['samosaPrice'])
	{
		$values = countVada($values);
		$values = countSamosa($values);
	}
	else
	{
		$values = countSamosa($values);
		$values = countVada($values);
	}

	$result = array(
		'totalPrice' => ($values['vadaSold'] * $values['vadaPrice']) + ($values['samosaSold'] * $values['samosaPrice']),
		'breadLeft' => $values['breadQty'],
		'samosaLeft' => $values['samosaLeft'],
		'vadaLeft' => $values['vadaLeft'],
		'samosaSold' => $values['samosaSold'],
		'vadaSold' => $values['vadaSold']
	);

	echo json_encode($result);

	function countVada($values)
	{
		$values['vadaSold'] = 0;
		$values['vadaLeft'] = $values['vadaQty'];
		if ($values['breadQty'] >= 2)
		{
			for ($i= 0; $i < $values['vadaQty']; $i++)
			{ 
				if ($values['breadQty'] >= 2)
				{
					$values['breadQty'] = $values['breadQty'] - 2;
					$values['vadaSold']++;
					$values['vadaLeft']--;
				}
			}
		}

		return $values;
	}

	function countSamosa($values)
	{
		$values['samosaSold'] = 0;
		$values['samosaLeft'] = $values['samosaQty'];
		if ($values['breadQty'] >= 2)
		{
			for ($i=0; $i < $values['samosaQty'] ; $i++)
			{ 
				if ($values['breadQty'] >= 2)
				{
					$values['breadQty'] = $values['breadQty'] - 2;
					$values['samosaSold']++;
					$values['samosaLeft']--;
				}
			}
		}

		return $values;
	}

?>