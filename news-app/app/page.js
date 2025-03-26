'use client';

import React, { useEffect, useState } from 'react';
import Image from 'next/image';

export default function ArticleList() {
  const [articles, setArticles] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchArticles = async () => {
      try {
        const response = await fetch(
          'https://newsapi.org/v2/top-headlines?country=us&apiKey=f5ff3c279c7b464e88e596795d69b7e8'
        );
        const data = await response.json();
        setArticles(data.articles || []);
      } catch (err) {
        setError('Error fetching articles');
      } finally {
        setLoading(false);
      }
    };

    fetchArticles();
  }, []);

  if (loading) {
    return <div>Loading articles...</div>;
  }

  if (error) {
    return <div>{error}</div>;
  }

  return (
    <div className="max-w-7xl mx-auto p-6 font-sans">
     

      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        {articles.map((article, index) => (
          <div key={index} className="bg-white shadow-lg rounded-lg overflow-hidden">
            {/* Article Image */}
            <div className="relative w-full h-56">
       {/*      <Image
                src={article.urlToImage}
                alt={article.title || 'No title'}
                layout="fill"
                objectFit="cover"
                className="rounded-md"
              /> */}
            </div>

            <div className="p-4">
              <h2 className="text-xl font-medium mb-2">{article.title}</h2>
              <p className="text-sm text-gray-600">{article.author || 'Unknown author'}</p>
              <p className="text-sm mt-2">{article.description || 'No description available.'}</p>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
