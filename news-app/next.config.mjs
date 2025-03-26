/** @type {import('next').NextConfig} */
/** @type {import('next').NextConfig} */
const nextConfig = {
  images: {
    domains: [
      'media.cnn.com',
      'npr.brightspotcdn.com',
      'npr-brightspot.s3.amazonaws.com'
    ],
    remotePatterns: [
      {
        protocol: 'https',
        hostname: '**.brightspotcdn.com',
      },
      {
        protocol: 'https',
        hostname: '**.s3.amazonaws.com',
      },
    ],
  },
};

export default nextConfig;