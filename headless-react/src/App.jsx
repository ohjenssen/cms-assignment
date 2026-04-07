import { useEffect, useState } from "react";
const API_BASE = import.meta.env.VITE_WP_API_BASE;
export default function App() {
const [posts, setPosts] = useState([]);
const [error, setError] = useState("");
const [loading, setLoading] = useState(true);
useEffect(() => {
let cancelled = false;
async function loadPosts() {
try {
setLoading(true);
setError("");
const url = `${API_BASE}/wp-json/wp/v2/posts?_embed&per_page=10`;
const res = await fetch(url);
if (!res.ok) {
throw new Error(`HTTP ${res.status}`);
}
const data = await res.json();
if (!cancelled) setPosts(data);
} catch (e) {
if (!cancelled) setError(String(e));
} finally {
if (!cancelled) setLoading(false);
}
}
loadPosts();
return () => {
cancelled = true;
};
}, []);
if (loading) return <p>Loading…</p>;
if (error) return <p style={{ color: "crimson" }}>Error: {error}</p>;
return (
<main style={{ maxWidth: 900, margin: "0 auto", padding: 16 }}>
<h1>Headless WordPress + React 19</h1>
<ul style={{ listStyle: "none", padding: 0, display: "grid", gap: 16 }}>
{posts.map((post) => (
<li
key={post.id}
style={{ border: "1px solid #ddd", padding: 16, borderRadius: 12 }}
>
<h2
style={{ marginTop: 0 }}
dangerouslySetInnerHTML={{ __html: post.title.rendered }}
/>
<div dangerouslySetInnerHTML={{ __html: post.excerpt.rendered }} />
<a href={post.link} target="_blank" rel="noreferrer">
Read on WordPress →
</a>
</li>
))}
</ul>
</main>
);
}