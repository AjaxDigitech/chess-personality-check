import { Redis } from '@upstash/redis';

const redis = new Redis({
  url: process.env.KV_REST_API_URL || process.env.UPSTASH_REDIS_REST_URL,
  token: process.env.KV_REST_API_TOKEN || process.env.UPSTASH_REDIS_REST_TOKEN,
});

async function getStats() {
  const [views, completed, likes] = await redis.mget(
    'chess:page_views',
    'chess:tests_completed',
    'chess:total_likes'
  );
  return {
    page_views: Number(views) || 0,
    tests_completed: Number(completed) || 0,
    total_likes: Number(likes) || 0,
  };
}

export default async function handler(req, res) {
  res.setHeader('Cache-Control', 'no-store');
  const action = req.query.action || '';

  try {
    if (action === 'get') {
      return res.status(200).json(await getStats());
    }
    if (action === 'view') {
      await redis.incr('chess:page_views');
      return res.status(200).json({ success: true });
    }
    if (action === 'like') {
      const total_likes = await redis.incr('chess:total_likes');
      return res.status(200).json({ total_likes });
    }
    if (action === 'complete') {
      await redis.incr('chess:tests_completed');
      return res.status(200).json({ success: true });
    }
    return res.status(400).json({ error: 'Unknown action' });
  } catch (e) {
    return res.status(500).json({ error: String(e.message || e) });
  }
}
