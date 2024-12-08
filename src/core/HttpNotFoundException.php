<?php

class HttpNotFoundException extends Exception
{

};

//  TODO:runActionメソッドの実行時に、paramsが存在しない場合にHttpNotFoundExceptionをスローするように修正する。それをキャッチした際に、404エラーを表示するようにする。