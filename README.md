# Simple A/B test Plug-in
==========
Copyright 2015, Kaseya Factory LLC. , baserCMS Users Community

Documentation
-------------
・インストールすると、固定ページ管理編集フォームの末尾に「TOPページグループ」のチェックボックスと「A/Bテストグループ」のinputが追加されます。

・「TOPページグループ」にチェックを入れると、TOPのURL（/）がアクセスされた際に、チェックされたページがランダムに選択されリダイレクトされます。

・「A/Bテストグループ」に文字列を入力すると、URLでその文字列が指定された際に、同じ文字列を指定されたページがランダムに選択されリダイレクトされます。

・リダイレクトの際はアクセス時のURLではなくリダイレクト先のURLが表示されますので、GoogleAnalyticsなどの解析が利用できます。

・「TOPページグループ」、「A/Bテストグループ」のどちらかだけを使用する場合、またそれぞれの項目タイトルを変更するには、Event/SimleAbHelperEventListener.phpのformAfterForm()を変更する事で改変可能です。

・Form.afterForm イベントを使用しますので、baserCMS 3.0.6以上のバージョンが必要です。

License
-------

Lincensed under the MIT lincense since version 2.0

