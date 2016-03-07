<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name wips.php
 * @date 2014-09-01 17:24:23
 */
 


$config["wips"] =  array (
  'sql' => 
  array (
    'enabled' => true,
    'dfunction' => 'load_file,hex,substring,if,ord,char,ascii,mid',
    'daction' => 'intooutfile,intodumpfile,unionselect,unionall,uniondistinct,(select',
    'dnote' => '#,--',
    'afullnote' => 'true',
    'dlikehex' => 'true',
    'foradm' => 'false',
    'autoups' => 'true',
  ),
);
?>