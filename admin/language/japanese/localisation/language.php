<?php
// Heading
$_['heading_title']     = '言語';  

// Text
$_['text_success']      = '成功: 言語の修正が完了しました。'; 

// Column
$_['column_name']       = '言語名';
$_['column_code']       = 'コード';
$_['column_sort_order'] = 'ソート順';
$_['column_action']     = 'アクション';

// Entry
$_['entry_name']        = '言語名:';
$_['entry_code']        = 'コード:<br /><span class="help">eg: en. 標準の言語のコードは変更しないでください。</span>';
$_['entry_locale']      = 'ロケール:<br /><span class="help">eg: en_US.UTF-8,en_US,en-gb,en_gb,english</span>';
$_['entry_image']       = '画像イメージ:<br /><span class="help">eg: gb.png</span>';
$_['entry_directory']   = 'ディレクトリ:<br /><span class="help">言語ディレクトリ名 (case-sensitive)</span>';
$_['entry_filename']    = 'ファイル名:<br /><span class="help">main language filename without extension</span>';
$_['entry_status']      = 'ステータス:<br /><span class="help">言語の表示非表示</span>';
$_['entry_sort_order']  = '表示順:';

// Error
$_['error_permission']  = 'Warning: 言語を修正するパーミッションがありません。!';
$_['error_name']        = 'Language 言語名は3文字以上32文字以内で入力してください。';
$_['error_code']        = 'Language コードは2文字必要です。';
$_['error_locale']      = 'Localeは必要です!';
$_['error_image']       = 'イメージファイル名は3文字以上64文字以内で入力してください。';
$_['error_directory']   = 'ディレクトリ名は必要です。';
$_['error_filename']    = 'ファイル名は3文字以上64文字以内で入力してください。';
$_['error_default']     = 'Warning: This language cannot be deleted as it is currently assigned as the default store language!';
$_['error_admin']       = 'Warning: This Language cannot be deleted as it is currently assigned as the administration language!';
$_['error_store']       = 'Warning: This language cannot be deleted as it is currently assigned to %s stores!';
$_['error_order']       = 'Warning: This language cannot be deleted as it is currently assigned to %s orders!';
?>