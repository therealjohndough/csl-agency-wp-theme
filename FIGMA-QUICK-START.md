# Figma Design System - Quick Start Guide

## ⚡ 5-Minute Setup

### Step 1: Create Figma File (1 min)
1. Open [Figma](https://figma.com)
2. Click **New design file**
3. Name it: **"Case Study Labs - Design System"**

### Step 2: Import Design Tokens (2 min)
1. In Figma, click **Local variables** icon (right sidebar)
2. Click the **Import/Export** button (...)
3. Select **Import from JSON**
4. Upload `figma-design-tokens.json`
5. ✅ All colors, typography, and spacing are now in Figma!

### Step 3: Install Fonts (1 min)
1. Install from Google Fonts:
   - [Montserrat](https://fonts.google.com/specimen/Montserrat)
   - [Fira Code](https://fonts.google.com/specimen/Fira+Code)
2. Or use Figma's font picker (auto-installs from Google Fonts)

### Step 4: Create Color Styles (1 min)
1. Select **Styles** panel
2. Create styles from your imported variables:
   - Primary/500 → "Primary"
   - Neutral/800 → "Background/Deep"
   - Neutral/50 → "Text/Primary"
   - (Repeat for all main colors)

---

## 🎨 What You Get

### Colors (60+ shades)
- ✅ Primary (Orange) - 9 shades
- ✅ Secondary (Off-white) - 9 shades
- ✅ Accent (Grey) - 9 shades
- ✅ Neutral (Dark mode) - 9 shades
- ✅ Semantic (Success, Warning, Error)
- ✅ Backgrounds (4 layers)
- ✅ Text (4 hierarchies)

### Typography (11 sizes)
- ✅ Font sizes: xs (12px) to 7xl (72px)
- ✅ Font weights: Regular, Medium, Semibold, Bold
- ✅ Line heights: Tight, Normal, Relaxed

### Spacing (12 values)
- ✅ Space 1 (4px) to Space 24 (96px)
- ✅ Based on 4px grid

### Effects
- ✅ Shadows (4 levels)
- ✅ Blurs (4 levels)
- ✅ Border radius (6 values)

---

## 📋 Next: Build Components

After importing tokens, build these components in order:

### Phase 1: Basics (30 min)
1. **Buttons** (Primary, Secondary, Ghost)
2. **Input fields** (Text, Textarea)
3. **Cards** (Glass, Elevated)

### Phase 2: Layout (20 min)
4. **Navigation** (Header, Nav links)
5. **Hero section** (Headline, CTA group)
6. **Containers** (Narrow, Default, Wide)

### Phase 3: Patterns (30 min)
7. **Project cards** (Image, Content, Hover states)
8. **Glass panels** (With blur, borders)
9. **Forms** (Labels, validation states)

**Total time:** ~1.5 hours for complete design system

---

## 📁 File Structure in Figma

```
📄 Case Study Labs - Design System
├── 📃 Page 1: Foundations
│   ├── Color Palette
│   ├── Typography Scale
│   ├── Spacing Grid
│   └── Effect Samples
│
├── 📃 Page 2: Components
│   ├── Buttons (all variants)
│   ├── Inputs
│   ├── Cards
│   └── Navigation
│
└── 📃 Page 3: Templates
    ├── Hero Section
    ├── Case Study Card
    └── Full Page Layout
```

---

## 🎯 Component Specs (Quick Reference)

### Button
```
Primary Button:
- Background: Primary-500 (#f97316)
- Text: White, Montserrat Semibold 16px
- Padding: 12px 24px
- Border radius: 8px
- Hover: Scale 1.05
```

### Input Field
```
Text Input:
- Background: rgba(255,255,255,0.08)
- Border: 1px solid rgba(255,255,255,0.12)
- Padding: 12px 16px
- Border radius: 8px
- Text: Neutral-50 (#f5f5f5)
```

### Glass Card
```
Card:
- Background: rgba(255,255,255,0.08)
- Border: 1px solid rgba(255,255,255,0.12)
- Backdrop blur: 12px
- Border radius: 12px
- Padding: 24px
- Shadow: 0 6px 20px rgba(0,0,0,0.1)
```

---

## 🔗 Resources

- **Full Guide**: See `FIGMA-DESIGN-SYSTEM.md`
- **Design Tokens**: `figma-design-tokens.json`
- **Live Site**: https://staging19.casestudy-labs.com/
- **CSS Source**: `style.css` (for exact values)

---

## ❓ Common Issues

**Q: Variables not importing?**
- Make sure JSON is valid
- Use Figma desktop app (not browser)
- Check file permissions

**Q: Fonts not showing?**
- Install locally or use Google Fonts plugin
- Restart Figma after installing fonts

**Q: How to use variables in components?**
- Click any property → Select variable icon → Choose from list
- Example: Fill → Variables → Colors/Primary/500

---

## ✅ After Setup

Once your design system is ready:

1. **Share Figma file URL** with me
2. I'll set up Figma MCP integration
3. Then I can generate code directly from your designs
4. Any design changes = instant code updates

**Ready? Start with Step 1 above! 🚀**
