# データベースQUEST　ステップ2
## 1. データベースを構築します

OSはWindows使用で解説していきます。

MySQL Command Line Client を立ち上げます

mysql>
の表示が出たら、データベースを作成するコマンドを入力。

今回はInternet_tvという名前でデータベースを作成します。

次のコマンドでデータベースを作成しましょう。

CREATE DATABASE Internet_tv;

データベースが作られたかどうかを確認します。

SHOW DATABASES;

データベースが作られたことが確認できたら、これから使用するデータベースを指定します。

USE Internet_tv;

USEステートメントで指定したデータベースを確認しましょう。

SELECT DATABASE();

ここでDATABASEにInternet_tvが表示されていたらOKです。

## 2. テーブルの構築

Internet_tvデータベースの中にテーブルを作成していきます。


### channelsテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE channels (
  channel_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  channels_name VARCHAR(255) NOT NULL
);

次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE channels;


### time_sectionsテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE time_sections (
  time_sections_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL
);

次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE time_sections;


### categoriesテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE categories (
  category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL
);

次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE categories;


### programsテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE programs (
  program_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  program_name VARCHAR(255) NOT NULL,
  program_details VARCHAR(255) NOT NULL,
  INDEX (program_name)
);


次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE programs;

次のコードを入力してください。
インデックスが登録されているかを確認しましょう。

SHOW INDEX FROM programs;

### program_categoriesテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE program_categories (
  program_id INT NOT NULL,
  category_id INT NOT NULL,
  PRIMARY KEY (program_id, category_id),
  FOREIGN KEY (program_id) REFERENCES programs(program_id),
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE program_categories;

### episodesテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE episodes (
  episode_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  program_id INT NOT NULL,
  season_no INT,
  episode_no INT,
  episode_title VARCHAR(255) NOT NULL,
  play_time INT NOT NULL,
  release_date DATE NOT NULL,
  episode_detail VARCHAR(255) NOT NULL,
  FOREIGN KEY (program_id) REFERENCES programs(program_id)
  INDEX (episode_title)
);


次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE episodes;

次のコードを入力してください。
インデックスが登録されているかを確認しましょう。

SHOW INDEX FROM episodes;

### channel_schedulesテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE channel_schedules (
  channel_schedule_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  channel_id INT NOT NULL,
  date DATE NOT NULL,
  time_section_id INT NOT NULL,
  episode_id INT NOT NULL,
  FOREIGN KEY (channel_id) REFERENCES channels(channel_id),
  FOREIGN KEY (time_section_id) REFERENCES time_sections(time_sections_id),
  FOREIGN KEY (episode_id) REFERENCES episodes(episode_id)
);

次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE channel_schedules;


### viewsテーブルを作成する

以下のコマンドを入力してください。

CREATE TABLE views(
  views_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  channel_schedule_id INT NOT NULL,
  episode_id INT NOT NULL,
  FOREIGN KEY (channel_schedule_id) REFERENCES channel_schedules(channel_schedule_id),
  FOREIGN KEY (episode_id) REFERENCES episodes(episode_id)
);

次のコードを入力してください。
作成したテーブルの詳細が表示されるので確認します。

DESCRIBE views;

## 3. サンプルデータのセット

### channelsテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
以下のコードを入力し実行してください。

INSERT INTO channels (channels_name) VALUES
('アニメストア'),
('こどもパーク'),
('アニメタイムズ'),
('アジアドラマチャンネル'),
('エンタメ・アジア'),
('シネマコレクション'),
('ニュースブロードバンド'),
('韓流コレクション'),
('オリジナルコレクション');

入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。

SELECT * FROM channels;

### time_sectionsテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
以下のコードを入力し実行してください。

INSERT INTO time_sections (start_time, end_time) VALUES
('00:00:00', '01:00:00'),
('01:00:00', '02:00:00'),
('02:00:00', '03:00:00'),
('03:00:00', '04:00:00'),
('04:00:00', '05:00:00'),
('05:00:00', '06:00:00'),
('06:00:00', '07:00:00'),
('07:00:00', '08:00:00'),
('08:00:00', '09:00:00'),
('09:00:00', '10:00:00'),
('10:00:00', '11:00:00'),
('11:00:00', '12:00:00'),
('12:00:00', '13:00:00'),
('13:00:00', '14:00:00'),
('14:00:00', '15:00:00'),
('15:00:00', '16:00:00'),
('16:00:00', '17:00:00'),
('17:00:00', '18:00:00'),
('18:00:00', '19:00:00'),
('19:00:00', '20:00:00'),
('20:00:00', '21:00:00'),
('21:00:00', '22:00:00'),
('22:00:00', '23:00:00'),
('23:00:00', '24:00:00');

入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。

SELECT * FROM time_sections;


### categoriesテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
以下のコードを入力し実行してください。

INSERT INTO categories (category_name) VALUES
('アイドル'),
('アクション・アドベンチャー'),
('アニメ'),
('トーク・バラエティーショー'),
('アートハウス'),
('フィットネス'),
('SF'),
('子ども・家族'),
('芸術・娯楽'),
('コメディ'),
('スポーツ'),
('インターナショナル'),
('ドキュメンタリー'),
('ドラマ'),
('ファンタジー'),
('ホラー'),
('サスペンス・スリラー'),
('ミュージカル'),
('ミュージックビデオ・コンサート'),
('ミリタリー・戦争'),
('リアリティ・台本なし'),
('ロマンス'),
('歴史'),
('スペシャルインタレスト'),
('ヤングアダルト'),
('アニメーション');

入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。

SELECT * FROM categories;


### programsテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
以下のコードを入力し実行してください。

INSERT INTO programs (program_name, program_details) VALUES
('アニメの森', '最新のアニメや人気アニメの再放送を放送する。'),
('アニメの歴史', 'アニメの歴史や制作の裏側を紹介する。'),
('おはよう！ドラえもん', '朝に放送するドラえもんの番組。'),
('おやすみなさい！アンパンマン', '夜に放送するアンパンマンの番組。'),
('アニソンのススメ', '人気アニメのテーマ曲を紹介する。'),
('アニメの声優さん', 'アニメの声優を特集する。'),
('韓流ドラマの王道', '韓国ドラマの定番作品を放送する。'),
('アジアドラマの最新作', 'アジア各国の最新ドラマを放送する。'),
('K-POPの魅力', 'K-POPの最新情報やアーティストを紹介する。'),
('アジア映画の旅', 'アジア各国の映画を紹介する。'),
('最新映画の予告', '最新映画の予告を放送する。'),
('名作映画の再放送', '過去の名作映画を放送する。'),
('世界はこう動いた', '世界情勢をまとめるニュース番組。'),
('日本はこう動いた', '日本のニュースをまとめるニュース番組。'),
('韓国ドラマの旅', '韓国ドラマの撮影地や文化を紹介する。'),
('韓国料理の秘密', '韓国料理の歴史やレシピを紹介する。'),
('オリジナルドラマ「君の声を、聞かせて」', '幼馴染の2人が交錯するが純恋愛ストーリー'),
('オリジナルドラマ「未来の記憶」', '男女2人が未来の記憶を見る恋愛・サスペンスドラマ');


入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。

SELECT * FROM programs;

### program_categoriesテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
以下のコードを入力し実行してください。

INSERT INTO program_categories (program_id, category_id) VALUES
(1, 14), (2, 19), (2, 6), (2, 7), (3, 13), (4, 11), (4, 7), (4, 12), (5, 7), (6, 11), (6, 19), (7, 17), (7, 13), (8, 14), (9, 23), (9, 19), (9, 5), (10, 7), (10, 3), (10, 13), (11, 15), (11, 6), (11, 17), (12, 13), (12, 24), (12, 16), (13, 12), (14, 26), (14, 20), (15, 15), (15, 4), (15, 3), (16, 16), (16, 17), (16, 20), (17, 17), (17, 26), (17, 16), (18, 10), (18, 20), (18, 24);


入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。
SELECT * FROM program_categories;


### episodesテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
以下のコードを入力し実行してください。

INSERT INTO episodes (program_id, season_no, episode_no, episode_title, play_time, release_date, episode_detail) VALUES
(1, 1, 1, 'アニメの森 シーズン1 エピソード1', 60, '2023-05-22', '最新のアニメや人気アニメの再放送を放送する。'),
(1, 1, 2, 'アニメの森 シーズン1 エピソード2', 60, '2023-06-19', 'アニメの歴史や制作の裏側を紹介する。'),
(1, 1, 3, 'アニメの森 シーズン1 エピソード3', 60, '2023-06-12', 'アニメの声優を特集する。'),
(1, 1, 4, 'アニメの森 シーズン1 エピソード4', 60, '2023-07-03', '人気アニメのテーマ曲を紹介する。'),
(1, 1, 5, 'アニメの森 シーズン1 エピソード5', 60, '2023-07-17', '韓国ドラマの定番作品を放送する。'),
(1, 2, 1, 'アニメの森 シーズン2 エピソード1', 60, '2023-07-24', 'シーズン2の第1エピソードの説明。'),
(1, 2, 2, 'アニメの森 シーズン2 エピソード2', 60, '2023-07-31', 'シーズン2の第2エピソードの説明。'),
(1, 2, 3, 'アニメの森 シーズン2 エピソード3', 60, '2023-08-07', 'シーズン2の第3エピソードの説明。'),
(1, 3, 1, 'アニメの森 シーズン3 エピソード1', 60, '2023-08-14', 'シーズン3の第1エピソードの説明。'),
(1, 3, 2, 'アニメの森 シーズン3 エピソード2', 60, '2023-08-21', 'シーズン3の第2エピソードの説明。'),
(2, 1, 1, 'アニメの歴史 シーズン1 エピソード1', 60, '2023-08-28', 'アニメの歴史や制作の裏側を紹介する。'),
(2, 1, 2, 'アニメの歴史 シーズン1 エピソード2', 60, '2023-09-04', 'アニメの声優を特集する。'),
(2, 1, 3, 'アニメの歴史 シーズン1 エピソード3', 60, '2023-09-11', '韓国ドラマの定番作品を放送する。'),
(2, 1, 4, 'アニメの歴史 シーズン1 エピソード4', 60, '2023-09-18', 'アジア各国の最新ドラマを放送する。'),
(2, 1, 5, 'アニメの歴史 シーズン1 エピソード5', 60, '2023-09-25', 'K-POPの最新情報やアーティストを紹介する。'),
(3, 1, 1, 'おはよう！ドラえもん シーズン1 エピソード1', 60, '2023-10-02', '朝に放送するドラえもんの番組。'),
(4, 1, 1, 'おやすみなさい！アンパンマン シーズン1 エピソード1', 60, '2023-10-09', '夜に放送するアンパンマンの番組。'),
(5, 1, 1, 'アニソンのススメ シーズン1 エピソード1', 60, '2023-10-16', '人気アニメのテーマ曲を紹介する。'),
(6, 1, 1, 'アニメの声優さん シーズン1 エピソード1', 60, '2023-10-23', 'アニメの声優を特集する。'),
(7, 1, 1, '韓流ドラマの王道 シーズン1 エピソード1', 60, '2023-10-30', '韓国ドラマの定番作品を放送する。'),
(8, 1, 1, 'アジアドラマの最新作 シーズン1 エピソード1', 60, '2023-11-06', 'アジア各国の最新ドラマを放送する。'),
(9, 1, 1, 'K-POPの魅力 シーズン1 エピソード1', 60, '2023-11-13', 'K-POPの最新情報やアーティストを紹介する。'),
(10, 1, 1, 'アジア映画の旅 シーズン1 エピソード1', 60, '2023-11-20', 'アジア各国の映画を紹介する。'),
(11, 1, 1, '最新映画の予告 シーズン1 エピソード1', 60, '2023-11-27', '最新映画の予告を放送する。'),
(12, 1, 1, '名作映画の再放送 シーズン1 エピソード1', 60, '2023-12-04', '過去の名作映画を放送する。'),
(13, 1, 1, '世界はこう動いた シーズン1 エピソード1', 60, '2023-12-11', '世界情勢をまとめるニュース番組。'),
(14, 1, 1, '日本はこう動いた シーズン1 エピソード1', 60, '2023-12-18', '日本のニュースをまとめるニュース番組。'),
(15, 1, 1, '韓国ドラマの旅 シーズン1 エピソード1', 60, '2023-12-25', '韓国ドラマの撮影地や文化を紹介する。'),
(16, 1, 1, '韓国料理の秘密 シーズン1 エピソード1', 60, '2023-12-26', '韓国料理の歴史やレシピを紹介する。'),
(17, 1, 1, 'オリジナルドラマ「君の声を、聞かせて」 シーズン1 エピソード1', 60, '2023-12-27', '幼馴染の2人が交錯するが純恋愛ストーリー。'),
(18, 1, 1, 'オリジナルドラマ「未来の記憶」 シーズン1 エピソード1', 60, '2023-12-28', '男女2人が未来の記憶を見る恋愛・サスペンスドラマ。');


入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。
SELECT * FROM episodes;


### channel_schedulesテーブルのサンプルデータ作成

まずサンプルデータを挿入します。
データ量が多いためファイルを取り込む形でテーブルにデータをセットします。

コマンドプロンプトを立ち上げてください。
以下のコードを入力しエンターキーを押してください。

mysql -u ユーザー名 -p -D internet_tv < channel_schedules_insert_corrected_v3.sql


入力ができたら以下のコードを実行してください。
表示されたカラムに不備がないか確認します。

SELECT * FROM channel_schedules;



### viewsテーブルのサンプルデータ作成

まずサンプルデータをCSVで用意します。
データ量が大きいためCSVファイルのままテーブルに取り込みます。
以下のコードを入力します。

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/channel_schedules_50.csv'
INTO TABLE views
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(channel_schedule_id, episode_id);

C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/channel_schedules_50.csv
これはサンプルデータが格納されている場所です。
端末によって場所が違うので確認して変更してください。

この操作を行うには、MySQLサーバーがファイルシステムに読み込む権限が必要です。
また、secure_file_privシステム変数が設定されている場合は、
その値で指定されたディレクトリ内のファイルのみを読み込むことができます。

指定されているディレクトリを確認するには以下のコマンドを入力してください。
SHOW VARIABLES LIKE 'secure_file_priv';


## まとめ

以上がテーブルとサンプルデータ挿入方法です。
お疲れ様でした。
