# SEO Implementation Checklist

## ✅ Code Complete (Deployed to Staging19)

- [x] SEO meta tags module created (`inc/seo-meta-tags.php`)
- [x] Module included in `functions.php`
- [x] Deployed to staging19 server
- [x] Documentation created (`SEO-OPTIMIZATION.md`)

---

## 🔧 WordPress Admin Tasks (Do These Next)

### 1. Verify Theme is Active
- Go to: WordPress Admin → Appearance → Themes
- Ensure **NEO-BRUTALIST-WP-THEME-CUSTOM** is activated
- If not active, activate it now

### 2. Upload Default Social Share Image (REQUIRED)
**Why:** This image appears when pages are shared on Facebook/Twitter

**Steps:**
1. Go to: WordPress Admin → **Appearance → Customize**
2. Find: **SEO Settings** section (new section added)
3. Upload: **Default Social Share Image**
   - Size: **1200x630 pixels**
   - Format: JPG or PNG
   - Recommended: Create branded image with logo + tagline
4. Click: **Publish**

**Where to create image:**
- Use Canva.com (free)
- Template: "Facebook Post" (1200x630px)
- Add: Case Study Labs logo + "Strategic Branding & Design"
- Colors: Use brand colors from design system

### 3. Set Twitter Handle
1. Still in: **Customizer → SEO Settings**
2. Find: **Twitter Handle**
3. Enter: `@case_study_labs`
4. Click: **Publish**

### 4. Clear Cache (IMPORTANT)
**Why:** SEO meta tags won't show until cache is cleared

**Steps:**
1. If using caching plugin (WP Super Cache, W3 Total Cache, etc.):
   - Go to plugin settings
   - Click "Clear All Cache" or "Purge Cache"
2. If using SiteGround hosting:
   - Go to: WordPress Admin → **Speed Optimizer**
   - Click: **Purge SiteGround Cache**
3. Clear browser cache:
   - Chrome/Firefox: Ctrl+Shift+Delete (Windows) or Cmd+Shift+Delete (Mac)
   - Select "Cached images and files"
   - Click "Clear data"

### 5. Add Excerpts to Key Pages
**Why:** Excerpts become meta descriptions for search engines

**Priority Pages:**
1. Homepage (if it's a page, not posts)
2. About page
3. Services page
4. Contact page
5. Top 5 case studies

**Steps:**
1. Go to: WordPress Admin → **Pages** (or Posts)
2. Click: Edit on each page
3. Find: **Excerpt** box (usually in right sidebar)
   - If not visible: Click "⋮" (three dots) → Preferences → Enable "Excerpt"
4. Write: 150-160 character description
   - Example: "Learn how Case Study Labs helps cannabis brands build compliant, premium identities that drive revenue and stand out in crowded markets."
5. Click: **Update**

### 6. Add Featured Images to All Case Studies
**Why:** Featured images become OG images for social sharing

**Steps:**
1. Go to: WordPress Admin → **Case Studies** (or Posts)
2. For each case study:
   - Click: **Set Featured Image**
   - Upload or select image (min 1200x630px)
   - Ideal: Use project hero image or brand lockup
3. Click: **Update**

### 7. Add Alt Text to Existing Images
**Why:** Accessibility + SEO for images

**Steps:**
1. Go to: WordPress Admin → **Media → Library**
2. Click on each image
3. Find: **Alternative Text** field
4. Add descriptive alt text:
   - Good: "Case Study Labs cannabis brand packaging design for Green Valley Dispensary"
   - Bad: "image1.jpg"
5. Click: **Update**

**Pro tip:** Start with images in case studies first (highest priority)

---

## 🧪 Testing (After Above Tasks)

### 1. View Page Source
1. Go to: https://staging19.casestudy-labs.com/
2. Right-click → **View Page Source**
3. Search for (Ctrl+F):
   - `og:image` - Should show your uploaded image
   - `twitter:card` - Should say "summary_large_image"
   - `meta name="description"` - Should show homepage description

**Expected output:**
```html
<meta name="description" content="Strategic branding and design agency...">
<meta property="og:image" content="https://staging19.casestudy-labs.com/wp-content/uploads/...">
<meta name="twitter:card" content="summary_large_image">
```

### 2. Facebook Debugger
1. Go to: https://developers.facebook.com/tools/debug/
2. Enter: https://staging19.casestudy-labs.com/
3. Click: **Debug**
4. Look for:
   - ✅ og:image shows your uploaded image
   - ✅ og:title shows site name
   - ✅ og:description shows description
5. If missing: Click "Scrape Again" (Facebook caches aggressively)

### 3. Twitter Card Validator
1. Go to: https://cards-dev.twitter.com/validator
2. Enter: https://staging19.casestudy-labs.com/
3. Click: **Preview card**
4. Should show: Large image card with title + description

### 4. Google Rich Results Test
1. Go to: https://search.google.com/test/rich-results
2. Enter: https://staging19.casestudy-labs.com/
3. Click: **Test URL**
4. Check for: Green checkmarks on structured data

---

## 🐛 Troubleshooting

### Meta tags not showing?
1. ✅ Clear all caches (WordPress, SiteGround, browser)
2. ✅ Verify theme is active
3. ✅ Check no SEO plugin is active (Yoast, RankMath)
   - Go to: Plugins → Installed Plugins
   - Deactivate any SEO plugins if found
4. ✅ Check PHP error log:
   - SSH into server
   - Check: `tail -f ~/www/staging19.casestudy-labs.com/logs/error.log`

### OG image not showing on Facebook?
1. Upload image in Customizer first
2. Clear WordPress cache
3. Use Facebook Debugger to force rescrape
4. Verify image is at least 1200x630px
5. Check image URL is accessible (paste in browser)

### Wrong description showing?
1. Add excerpt to page/post
2. Keep it 150-160 characters
3. Clear cache
4. Wait 24-48 hours for Google to recrawl

---

## 📊 Current Status

### Working ✅
- SEO module code deployed
- Auto-generates meta descriptions from excerpts
- Auto-generates OG tags
- Auto-generates Twitter Cards
- Customizer settings added
- Documentation complete

### Needs Manual Work ⚠️
- [ ] Upload default OG image (1200x630px)
- [ ] Set Twitter handle in Customizer
- [ ] Clear cache to see changes
- [ ] Add excerpts to key pages
- [ ] Add featured images to case studies
- [ ] Add alt text to media library images
- [ ] Test with Facebook/Twitter validators

---

## ⏱️ Time Estimate

- **Upload OG image:** 5 minutes
- **Set Twitter handle:** 1 minute
- **Clear cache:** 2 minutes
- **Add excerpts to 10 pages:** 30 minutes
- **Add featured images to case studies:** 20 minutes
- **Add alt text to images:** 30-60 minutes
- **Testing:** 10 minutes

**Total:** ~2 hours for full SEO setup

---

## 🎯 Priority Order

Do these in order for fastest SEO improvement:

1. **Clear cache** (2 min) - Required to see any changes
2. **Upload OG image** (5 min) - Biggest visual impact
3. **Set Twitter handle** (1 min) - Quick win
4. **Test homepage** (5 min) - Verify it's working
5. **Add excerpts to top 5 pages** (20 min) - High value
6. **Add featured images to case studies** (20 min) - Social sharing
7. **Submit to Google Search Console** (10 min) - Long-term monitoring

---

**Last Updated:** 2025-10-10
**Location:** WordPress Admin required for all tasks
**Access:** https://staging19.casestudy-labs.com/wp-admin/
