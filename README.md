# Sunfish

## What is this?
日本取引所グループ (JPX) の公式サイトから、貸借銘柄を取得しやすくするためのWrapper Web API。
* [制度信用・貸借銘柄一覧 | 日本取引所グループ](https://www.jpx.co.jp/listing/others/margin/index.html)

なんでこんなもの作ったかというと、JPXが古いExcelフォーマットでしか貸借銘柄情報を提供してくれないから。


## Requirement
* docker
* docker-compose

どうしてもdockerで動かしたくないときは、`Dockerfile` や `docker_files/nginx/conf.d/default.conf` を参考にいい感じにサーバ構築して下さい。


## Usage
*make docker/up*
.env内 `APP_PORT` で指定したポートでWeb APIサーバが起動します。

*make docker/down*
Web APIサーバが終了します。

*make docker/logs*
Web APIサーバのログをtailします。


## Contribution
あなたが神ですか？！
大歓迎です、IssueからでもPRからでもコミットをお待ちしております。


## Contact
これを作った人とコンタクトを取りたいときはTwitterでお願いします。

Twitter: [@pinkumohikan](https://twitter.com/pinkumohikan)

