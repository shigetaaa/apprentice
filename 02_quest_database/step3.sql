/*1.よく見られているエピソードを知りたいです。エピソード視聴数トップ3のエピソードタイトルと視聴数を取得してください
結合 viewsテーブル channel_schedulesテーブル episodesテーブル */

SELECT
  episode_title, COUNT(views.episode_id) AS episode_views_count
FROM
  views
INNER JOIN
  episodes ON views.episode_id = episodes.episode_id
GROUP BY
  episodes.episode_id
ORDER BY
  episode_views_count DESC
LIMIT 3;

-- Language: sql
/*2.よく見られているエピソードの番組情報やシーズン情報も合わせて知りたいです。エピソード視聴数トップ3の番組タイトル、シーズン数、エピソード数、エピソードタイトル、視聴数を取得してください
結合 viewsテーブル programsテーブル episodesテーブル*/

SELECT
  programs.program_name, episodes.season_no, episodes.episode_no, episodes.episode_title, COUNT(views.episode_id) AS episode_views_count
FROM
  episodes
INNER JOIN
  views ON episodes.episode_id = views.episode_id
INNER JOIN
  programs ON episodes.program_id = programs.program_id
GROUP BY
  episodes.episode_id
ORDER BY
  episode_views_count DESC
LIMIT 3;


/*3.本日の番組表を表示するために、本日、どのチャンネルの、何時から、何の番組が放送されるのかを知りたいです。本日放送される全ての番組に対して、チャンネル名、放送開始時刻(日付+時間)、放送終了時刻、シーズン数、エピソード数、エピソードタイトル、エピソード詳細を取得してください。なお、番組の開始時刻が本日のものを本日方法される番組とみなすものとします
結合 channelsテーブル channel_schedulesテーブル time_sectionsテーブル episodesテーブル*/

SELECT
  channels_name, channel_schedules.date, time_sections.start_time, time_sections.end_time, episodes.season_no, episodes.episode_no, episodes.episode_title, episodes.episode_detail
FROM
  channels
INNER JOIN
  channel_schedules ON channels.channel_id = channel_schedules.channel_id
INNER JOIN
  time_sections ON channel_schedules.time_section_id = time_sections.time_sections_id
INNER JOIN
  episodes ON channel_schedules.episode_id = episodes.episode_id
WHERE
  channel_schedules.date = CURDATE();



/*4.ドラマというチャンネルがあったとして、ドラマのチャンネルの番組表を表示するために、本日から一週間分、何日の何時から何の番組が放送されるのかを知りたいです。ドラマのチャンネルに対して、放送開始時刻、放送終了時刻、シーズン数、エピソード数、エピソードタイトル、エピソード詳細を本日から一週間分取得してください
結合 channel_schedulesテーブル, time_sectionsテーブル, episodesテーブル, programsテーブル
*/

SELECT
  channel_schedules.date, time_sections.start_time, time_sections.end_time, programs.program_name, episodes.season_no, episodes.episode_no, episodes.episode_title, episodes.episode_detail
FROM
  channel_schedules
INNER JOIN
  time_sections ON channel_schedules.time_section_id = time_sections.time_sections_id
INNER JOIN
  episodes ON channel_schedules.episode_id = episodes.episode_id
INNER JOIN
  programs ON episodes.program_id = programs.program_id
WHERE
  channel_schedules.date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
GROUP BY
  channel_schedules.date, time_sections.start_time, time_sections.end_time, programs.program_name, episodes.season_no, episodes.episode_no, episodes.episode_title, episodes.episode_detail
ORDER BY
  channel_schedules.date ASC;
