/**
 * Сборка WordPress WXR (eXtended RSS) XML для импорта постов.
 * Формат совместим с импортом WordPress: item с content:encoded, wp:post_type,
 * wp:status=future, wp:post_date для отложенной публикации.
 */

const { getSchedule } = require('./scheduler.js');

const CONTENT_NS = 'http://purl.org/rss/1.0/modules/content/';
const WP_NS = 'http://wordpress.org/export/1.2/';

function escapeXml(unsafe) {
  if (unsafe == null) return '';
  return String(unsafe)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&apos;');
}

/**
 * Собирает WXR XML из массива статей.
 * @param {Array<{ title: string, content: string, meta_description?: string }>} articles
 * @returns {string} XML
 */
function buildWxr(articles) {
  const dates = getSchedule(articles.length);
  const channelItems = articles
    .map((article, index) => buildItem(article, dates[index], index + 1))
    .join('\n');

  return `<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
  xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
  xmlns:content="${CONTENT_NS}"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:wp="${WP_NS}">
<channel>
  <title>SEO Articles Export</title>
  <link></link>
  <description>Mass-generated SEO articles</description>
  <pubDate>${new Date().toUTCString()}</pubDate>
  <language>ru</language>
  <wp:wxr_version>1.2</wp:wxr_version>
  <wp:base_site_url></wp:base_site_url>
  <wp:base_blog_url></wp:base_blog_url>
${channelItems}
</channel>
</rss>`;
}

function buildItem(article, postDate, postId) {
  const title = escapeXml(article.title || '');
  const content = article.content || '';
  const cdata = content.replace(/]]>/, ']]]]><![CDATA[>');

  return `  <item>
    <title>${title}</title>
    <content:encoded><![CDATA[${cdata}]]></content:encoded>
    <wp:post_id>${postId}</wp:post_id>
    <wp:post_type>post</wp:post_type>
    <wp:status>future</wp:status>
    <wp:post_date>${postDate}</wp:post_date>
    <wp:post_date_gmt>${postDate}</wp:post_date_gmt>
  </item>`;
}

module.exports = { buildWxr };
