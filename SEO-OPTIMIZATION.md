# SEO Optimization Guide

## ✅ What's Implemented

### Meta Tags
- ✅ **Meta Description** - Auto-generated from excerpt/content
- ✅ **Canonical URLs** - Prevents duplicate content
- ✅ **Robots Meta** - Tells search engines how to index

### Open Graph (Facebook)
- ✅ og:title
- ✅ og:description
- ✅ og:image (1200x630px)
- ✅ og:url
- ✅ og:type (website/article)
- ✅ og:site_name
- ✅ og:locale

### Twitter Cards
- ✅ twitter:card (large image)
- ✅ twitter:title
- ✅ twitter:description
- ✅ twitter:image
- ✅ twitter:site (@case_study_labs)
- ✅ twitter:creator

### Schema.org Structured Data
Already in `functions.php`:
- ✅ Organization schema
- ✅ WebSite schema
- ✅ Person schema (founder)
- ✅ Article schema (blog posts)
- ✅ Breadcrumbs
- ✅ HowTo schema (process page)

### Image Optimization
- ✅ Auto-generated alt text for images
- ✅ Fallback to image title if alt missing

---

## ⚙️ Setup Instructions

### 1. Upload Default Social Share Image

**Required Image:**
- **Size**: 1200x630px
- **Format**: JPG or PNG
- **Path**: Upload to WordPress Media Library

**Steps:**
1. Go to WordPress Admin → **Appearance → Customize**
2. Find **SEO Settings** section
3. Upload **Default Social Share Image** (1200x630px)
4. This image shows when pages don't have featured images

### 2. Set Twitter Handle

1. In Customizer → **SEO Settings**
2. Set **Twitter Handle**: `@case_study_labs`
3. Appears in Twitter Cards

### 3. Customize Homepage Description (Optional)

1. In Customizer → **SEO Settings**
2. Add custom **Homepage Meta Description**
3. 150-160 characters recommended
4. Default: "Strategic branding and design agency..."

---

## 📊 Current SEO Score

### ✅ Implemented (90%)
- Meta descriptions
- Open Graph tags
- Twitter Cards
- Structured data (Schema.org)
- Canonical URLs
- Image alt text
- XML Sitemap (WordPress core)

### ⚠️ To Improve
1. **Upload OG Image** - Default social share image needed
2. **Add Alt Text** - Manually add to existing images in Media Library
3. **Page Titles** - Review and optimize per page
4. **Meta Descriptions** - Customize for key pages

---

## 🎯 Page-Specific SEO

### Homepage
- **Title**: Case Study Labs — Strategic Branding & Design
- **Description**: Auto from site tagline or custom in Customizer
- **OG Image**: Upload default image

### Blog Posts
- **Title**: Auto-generated from post title
- **Description**: Auto from excerpt (add excerpt to posts!)
- **OG Image**: Featured image (set on each post)

### Case Studies
- **Title**: Auto from case study title
- **Description**: Auto from excerpt
- **OG Image**: Featured image (IMPORTANT: add to all case studies)

### Pages
- **Title**: Auto from page title
- **Description**: Auto from page excerpt
- **OG Image**: Featured image or default

---

## 🔍 Testing Your SEO

### 1. Facebook Debugger
```
https://developers.facebook.com/tools/debug/
```
- Paste your URL
- Check OG tags are showing
- Preview how it looks when shared

### 2. Twitter Card Validator
```
https://cards-dev.twitter.com/validator
```
- Paste your URL
- Preview Twitter card
- Check image displays correctly

### 3. Google Rich Results Test
```
https://search.google.com/test/rich-results
```
- Test structured data
- Verify schema markup
- Check for errors

### 4. PageSpeed Insights
```
https://pagespeed.web.dev/
```
- Test mobile/desktop performance
- Check SEO basics
- Get optimization suggestions

---

## 📝 Best Practices

### For Every New Page/Post:

1. ✅ **Add Excerpt** - Used for meta description
2. ✅ **Set Featured Image** - 1200x630px minimum
3. ✅ **Add Alt Text** - Describe image for accessibility
4. ✅ **Use Headings** - H1 (title), H2 (sections), H3 (subsections)
5. ✅ **Internal Links** - Link to related content

### For Images:

1. **Optimize Before Upload**
   - Compress (use TinyPNG or similar)
   - Proper dimensions (don't upload huge images)
   - Descriptive filenames

2. **Add Alt Text**
   - Be descriptive
   - Include keywords naturally
   - Don't stuff keywords

### For Titles:

```
Good: "Cannabis Branding Services — Case Study Labs"
Bad: "Home | Case Study Labs"

Good: "How to Build a Cannabis Brand — Complete Guide"
Bad: "Blog Post 1"
```

### For Descriptions:

```
Good: "Learn how to build a compliant cannabis brand with our step-by-step guide. Expert tips on naming, visual identity, and market positioning."

Bad: "This is a blog post about cannabis branding."
```

---

## 🚀 Quick Wins

### Immediate Actions (30 mins):

1. **Upload OG Image** (Customizer → SEO Settings)
2. **Set Twitter Handle** (@case_study_labs)
3. **Add Excerpts** to 5 most important pages
4. **Add Featured Images** to all case studies
5. **Review Homepage Description**

### This Week:

1. Add alt text to all existing images
2. Create custom OG images for key pages
3. Optimize page titles
4. Write custom meta descriptions for top 10 pages
5. Check all internal links work

### Ongoing:

1. Always add excerpt to new posts
2. Always set featured image
3. Always add alt text to images
4. Monitor search console weekly
5. Update old content quarterly

---

## 📈 Monitoring SEO

### Google Search Console
```
https://search.google.com/search-console
```
- Monitor search traffic
- Find indexing issues
- See which keywords bring traffic
- Check mobile usability

### What to Check Weekly:
- Total clicks/impressions
- Average position
- Coverage errors
- Mobile usability issues

---

## 🆘 Troubleshooting

**Q: OG image not showing on Facebook?**
- Use Facebook Debugger to scrape URL
- Check image is 1200x630px minimum
- Verify image URL is accessible

**Q: Description not showing in search?**
- Add excerpt to page/post
- Check it's 150-160 characters
- Give Google time to re-crawl (can take days)

**Q: Page not indexing?**
- Check robots.txt not blocking
- Verify not set to noindex
- Submit URL in Search Console

---

## 📚 Resources

- [Google SEO Starter Guide](https://developers.google.com/search/docs/beginner/seo-starter-guide)
- [Yoast SEO Blog](https://yoast.com/seo-blog/)
- [Moz Beginner's Guide](https://moz.com/beginners-guide-to-seo)

---

**File**: `/inc/seo-meta-tags.php`
**Last Updated**: 2025-10-10
