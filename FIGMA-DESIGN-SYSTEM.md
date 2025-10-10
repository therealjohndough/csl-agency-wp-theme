# Case Study Labs - Figma Design System Guide

## 🎨 Design System Overview

This document contains all specifications to build the complete Case Study Labs design system in Figma.

---

## 📦 Step 1: Import Variables

### Import the Design Tokens JSON

1. Open Figma
2. Create a new file: **"CSL Design System"**
3. Go to **Local variables** (right sidebar)
4. Click **Import variables**
5. Select `figma-design-tokens.json`
6. All colors, typography, and spacing will be imported automatically

---

## 🎨 Step 2: Color System

### Color Collections

**Primary (Industrial Orange)**
- Use for: CTAs, links, active states, brand accents
- Base: `#f97316`
- 9 shades from lightest (#fff7ed) to darkest (#7c2d12)

**Secondary (TE Off-White)**
- Use for: Secondary buttons, subtle backgrounds
- Base: `#c7c3c0`
- 9 shades for flexibility

**Accent (Muted Grey)**
- Use for: Tertiary elements, dividers
- Base: `#666666`

**Neutral (Dark Mode)**
- 50: Lightest text (#f5f5f5)
- 700: Primary surface (#2d2d2d)
- 800: Deep background (#1a1a1a)
- 900: Deepest black (#111111)

**Semantic**
- Success: #3A7B4D (green)
- Warning/Error: #D42A02 (red)
- Info: #c7c3c0 (off-white)

### Background Colors
- **Deep**: #1a1a1a (Page background)
- **Surface**: #2d2d2d (Cards, panels)
- **Elevated**: #171717 (Modals, popovers)
- **Overlay**: #3b3b3b (Overlays)

### Text Colors
- **Primary**: #f5f5f5 (Main text on dark)
- **Secondary**: #c7c3c0 (Subtext)
- **Muted**: #525252 (Disabled/inactive)
- **Inverse**: #111111 (Text on light backgrounds)

---

## ✍️ Step 3: Typography

### Font Families
1. Install **Montserrat** (Google Fonts)
2. Install **Fira Code** (Google Fonts)

### Type Scale
```
H1: 36px (2.25rem) - Bold (700)
H2: 30px (1.875rem) - Bold (700)
H3: 24px (1.5rem) - Semibold (600)
H4: 20px (1.25rem) - Semibold (600)
Body Large: 18px (1.125rem) - Regular (400)
Body: 16px (1rem) - Regular (400)
Body Small: 14px (0.875rem) - Regular (400)
Caption: 12px (0.75rem) - Medium (500)
```

### Line Heights
- **Tight**: 1.25 (headings)
- **Normal**: 1.5 (body text)
- **Relaxed**: 1.75 (long-form content)

---

## 📏 Step 4: Spacing System

### Spacing Scale (in px)
```
1  = 4px
2  = 8px
3  = 12px
4  = 16px   ← Base unit
5  = 20px
6  = 24px
8  = 32px
10 = 40px
12 = 48px
16 = 64px
20 = 80px
24 = 96px
```

### Component Spacing
- **Card padding**: 24px (space-6)
- **Section padding**: 48-96px (space-12 to space-24)
- **Grid gaps**: 24px (space-6)
- **Inline elements**: 8-16px (space-2 to space-4)

---

## 🔲 Step 5: Border Radius

```
sm   = 6px   (Small elements)
base = 8px   (Default)
lg   = 12px  (Cards)
xl   = 16px  (Large cards)
2xl  = 24px  (Hero sections)
full = 9999px (Pills, rounded buttons)
```

---

## 💫 Step 6: Effects

### Shadows (Glass morphism)
```
sm:   0 4px 12px rgba(0, 0, 0, 0.07)
base: 0 6px 20px rgba(0, 0, 0, 0.1)
lg:   0 10px 40px rgba(0, 0, 0, 0.15)
xl:   0 16px 50px rgba(0, 0, 0, 0.2)
```

### Backdrop Blur
```
sm:   6px
base: 12px
lg:   20px
xl:   28px
```

### Glow Effects (for dark mode)
```
Primary Glow:
  - Inner: 0 0 8px rgba(249, 115, 22, 0.35)
  - Outer: 0 0 16px rgba(249, 115, 22, 0.25)

Secondary Glow:
  - Inner: 0 0 8px rgba(199, 195, 192, 0.3)
  - Outer: 0 0 16px rgba(199, 195, 192, 0.2)
```

---

## 🧩 Step 7: Components to Create

### 1. Buttons

**Primary Button**
- Background: Primary-500 (#f97316)
- Text: White
- Padding: 12px 24px (space-3 space-6)
- Border radius: 8px (base)
- Font: Montserrat Semibold 16px
- Hover: Primary-600 + scale 1.05
- Active: Primary-700

**Secondary Button**
- Background: Neutral-700 (#2d2d2d)
- Border: 1px solid rgba(255,255,255,0.2)
- Text: Neutral-50 (#f5f5f5)
- Same padding/radius as primary
- Hover: Neutral-600 + glow

**Ghost Button**
- Background: Transparent
- Border: 1px solid Primary-500
- Text: Primary-500
- Hover: Background Primary-500/10

**Button Sizes**
- Small: 8px 16px, 14px font
- Medium: 12px 24px, 16px font (default)
- Large: 16px 32px, 18px font

### 2. Input Fields

**Text Input**
- Background: rgba(255,255,255,0.08) (glass-bg-light)
- Border: 1px solid rgba(255,255,255,0.12)
- Padding: 12px 16px
- Border radius: 8px
- Text: Neutral-50
- Placeholder: Neutral-500
- Focus: Border Primary-500 + Primary glow

**Textarea**
- Same as text input
- Min height: 120px
- Resize: vertical

### 3. Cards

**Glass Card**
- Background: rgba(255,255,255,0.08)
- Border: 1px solid rgba(255,255,255,0.12)
- Backdrop blur: 12px
- Border radius: 12px (lg)
- Padding: 24px (space-6)
- Shadow: 0 6px 20px rgba(0,0,0,0.1)

**Elevated Card**
- Background: Neutral-700 (#2d2d2d)
- Border: 1px solid rgba(255,255,255,0.1)
- Border radius: 16px (xl)
- Padding: 32px (space-8)
- Shadow: 0 10px 40px rgba(0,0,0,0.15)

### 4. Navigation

**Header**
- Height: 80px
- Background: rgba(255,255,255,0.08)
- Backdrop blur: 12px
- Border bottom: 1px solid rgba(255,255,255,0.05)
- Padding: 0 24px
- Position: Fixed top

**Nav Links**
- Font: Montserrat Medium 16px
- Color: Neutral-50
- Hover: Primary-500
- Active: Primary-500 + underline
- Spacing: 32px between links

### 5. Hero Section

**Container**
- Min height: 100vh
- Background: Gradient (Dark → Primary/20)
- Padding: 120px 24px 80px

**Headline**
- Font: Montserrat Bold 48-72px (responsive)
- Color: White
- Line height: Tight (1.25)
- Letter spacing: -0.02em

**Subheading**
- Font: Montserrat Regular 18-24px
- Color: rgba(255,255,255,0.8)
- Max width: 600px
- Margin: 24px auto

**CTA Group**
- Display: Flex, gap 16px
- Margin top: 32px

### 6. Project/Case Study Cards

**Card Layout**
- Aspect ratio: 16:9 (image)
- Border radius: 12px
- Overflow: hidden
- Hover: Scale 1.05 (image)

**Image**
- Transition: transform 0.5s ease

**Content**
- Padding: 24px
- Background: Glass card

**Title**
- Font: Montserrat Bold 24px
- Color: Neutral-50
- Margin bottom: 12px

**Excerpt**
- Font: Montserrat Regular 16px
- Color: Neutral-300
- Line clamp: 3 lines

### 7. Forms

**Form Group**
- Margin bottom: 24px

**Label**
- Font: Montserrat Medium 14px
- Color: Neutral-50
- Margin bottom: 8px

**Error State**
- Border: Error color
- Text: Error color below input

**Success State**
- Border: Success color
- Checkmark icon

---

## 🎭 Step 8: Component States

### Interactive States
1. **Default**: Base styling
2. **Hover**: Subtle scale/glow
3. **Active**: Pressed state
4. **Focus**: Primary glow ring
5. **Disabled**: 50% opacity, cursor not-allowed

### Animation Timing
- Fast: 150ms (micro-interactions)
- Medium: 300ms (transitions)
- Slow: 600ms (page transitions)
- Spring: 400ms (elastic)

---

## 📱 Step 9: Responsive Breakpoints

```
Mobile:  < 640px
Tablet:  640px - 1024px
Desktop: > 1024px
Wide:    > 1440px
```

### Container Max Widths
- Narrow: 720px (content)
- Default: 1200px (standard)
- Wide: 1440px (full)

---

## 🎨 Step 10: Create Master Components

### Component Organization
```
📁 Design System
  ├── 🎨 Foundations
  │   ├── Colors
  │   ├── Typography
  │   ├── Spacing
  │   └── Effects
  ├── 🧩 Components
  │   ├── Buttons
  │   ├── Inputs
  │   ├── Cards
  │   ├── Navigation
  │   └── Forms
  ├── 📐 Layouts
  │   ├── Hero
  │   ├── Grid
  │   └── Containers
  └── 🎭 Patterns
      ├── Project Cards
      ├── Glass Panels
      └── Animated States
```

---

## ✅ Checklist

- [ ] Import `figma-design-tokens.json`
- [ ] Set up color styles (Primary, Secondary, Accent, Neutral)
- [ ] Create text styles (H1-H4, Body, Caption)
- [ ] Define spacing variables
- [ ] Create effect styles (shadows, blurs, glows)
- [ ] Build button components (3 variants × 3 sizes)
- [ ] Build input components
- [ ] Build card components (2 variants)
- [ ] Build navigation component
- [ ] Create layout templates
- [ ] Document component usage
- [ ] Export as Figma library

---

## 🔗 Resources

- **Design Tokens**: `figma-design-tokens.json`
- **Live Site**: https://staging19.casestudy-labs.com/
- **GitHub**: https://github.com/therealjohndough/csl-agency-wp-theme
- **Fonts**:
  - Montserrat: https://fonts.google.com/specimen/Montserrat
  - Fira Code: https://fonts.google.com/specimen/Fira+Code

---

**Questions?** Refer to `/style.css` in the theme for exact CSS variable values.
