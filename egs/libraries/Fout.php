<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * EGs Web Panel (Web Services for Atheme)
 *
 * author: J. Newing (synmuffin)
 * email: jnewing [at] gmail [dot] com
 * version: 3.0
 *
 */

/**
 * Fout Library
 * 
 */
class Fout {

	
	//========================================================
	// PRIVATE VARS
	//========================================================
	
	
	//========================================================
	// PUBLIC VARS
	//========================================================
	
	
	//========================================================
	// PUBLIC FUNCTIONS
	//========================================================

		
	/**
	 * Construct
	 *
	 */
	public function __construct($params = NULL)
	{
		// here there be tygers
	}
	// --------------------------------------------------------
	
	
	/**
	 * as_array()
	 * function formats the xmlrpc servers response as an array split by newline
	 *
	 * @param string $str 		- string of server response
	 * @param bool $last_line	- output the last line?
	 * @param bool $print		- print the output? or return it
	 *
	 */ 
	public function as_array($str, $last_line = TRUE, $print = FALSE)
	{
		$data = preg_split('/$\r|\n/', $str);
		
		if (!$last_line)
			array_pop($data);
		
		if ($print)
		{
			foreach ($data as $line)
				print $line;
		}
		else
		{
			return $data;
		}		
	}
	// --------------------------------------------------------


	/**
	 * as_akills()
	 * functoin formats the output as if it were a lit of akills being pushed to an oper
	 *
	 * @param array $akills_array 		- array of akills
	 */
	public function as_akills($akills_array)
	{
		$akill_data = array();

		// remove first and last array entries
		array_pop($akills_array);
		array_shift($akills_array);

		foreach ($akills_array as $akill)
		{
			preg_match('/([0-9]{1,9}): (.*) - (.*) - (.*) - (.*)/sm', $akill, $parts);
			$tmp['id'] 			= $parts[1];
			$tmp['nick_host'] 	= $parts[2];
			$tmp['added_by']	= $parts[3];
			$tmp['expires']		= $parts[4];
			$tmp['reason']		= $parts[5];
			
			array_push($akill_data, $tmp); 
		}

		return $akill_data;
	}
	// --------------------------------------------------------
	
	
	/**
	 * as_memos()
	 * function formats the servers response as if they were memos
	 *
	 * @param array $memos_array	- array of memos
	 */
	public function as_memos($memos_array)
	{
		$memo_data = array();
		foreach ($memos_array as $memo)
		{
			preg_match('/- (.*) From: (.*) Sent: (.*)/', $memo, $tmp);
			
			if (preg_match('/\[(unread)\]/', $tmp[3], $tmp1))
			{
				$tmp[3] = substr($tmp[3], 0, -8);
				$tmp[4] = "unread";
			}
			else
			{
				$tmp[4] = "read";
			}
			
			array_push($memo_data, $tmp);
		}
		
		return $memo_data;
	}
	// --------------------------------------------------------
	
	
	/**
	 * single_memo
	 * function formats the output as a single memo
	 *
	 * @param string $memodata 	- the string memodata
	 *
	 */
	public function single_memo($memodata)
	{
		$memo_data = array();
		preg_match('/- (.*) From: (.*) Sent: (.*)/', $memodata, $memo_data);
		
		return $memo_data;
	}
	// --------------------------------------------------------
	
	
	/**
	 * reply_memo()
	 * regex to grab the username so we can fwd or reply to the memo for the user
	 *
	 * @param string $str 	- string of the memo
	 *
	 */
	public function reply_memo($str)
	{
		preg_match('/.* - Sent by (.*),/', $str, $tmp);
		return $tmp;
	}
	// --------------------------------------------------------
	
	
	/**
	 * nick_info()
	 * function will spit up the nickname info, remove the stuff we don't want.
	 *
	 * @param string $str 	- string of the nickname info (raw server response)
	 *
	 */
	public function nick_info($str)
	{
		$tmp = preg_split('/$\r|\n/', $str);
		array_pop($tmp);
		
		return $tmp;
	}
	// --------------------------------------------------------
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================
	
}

?>
