# 🌍 Heritage Network — Project Vision

منصة تواصل اجتماعي موجهة لحفظ ونشر التراث الموصلي (Laravel 12 + Livewire 3).

---

## 🎯 الرؤية

-   إنشاء فضاء تفاعلي لحفظ وتوثيق التراث (مادي/غير مادي).
-   تمكين المجتمع (مساهمين، خبراء، إداريين) من نشر، مراجعة، والتحقق من المواد.
-   استخدام الذكاء الاصطناعي لدعم الفهرسة والترميم والتصنيف.

---

## 👥 أدوار المستخدمين

-   **زائر (Guest):** تصفح المحتوى approved فقط.
-   **مساهم (Member):** رفع مواد → تمر عبر المراجعة.
-   **خبير (Expert):** يستطيع تأييد المواد بعد الموافقة الإدارية.
-   **مدير (Admin):** مراجعة/قبول/رفض/طلب تعديلات + إدارة البلاغات والأدوار.

---

## 🔑 دورة حياة المحتوى

1. **Draft**: المستخدم ينشئ مادة.
2. **Submitted**: إرسال للمراجعة.
3. **Under Review**: المدير يفتحها للمراجعة.
4. **Approved/Rejected/Changes Requested**: نتيجة المراجعة.
5. **Accepted**: بعد تأييد الخبراء + لا تقارير حرجة.

---

## ✨ الميزات الأساسية

-   إنشاء منشورات مع وسائط متعددة.
-   مراجعة إدارية (approve/reject/changes).
-   تأييد الخبراء (endorse) + Badge “Accepted”.
-   التعليقات، الإعجابات، المتابعة، التنبيهات.
-   الوسوم، التصنيفات، المواقع الجغرافية.
-   البلاغات وإدارة المخالفات.
-   صفحة شخصية لكل مستخدم.
-   تكامل لاحق مع الذكاء الاصطناعي (OCR, ترميم الصور, ترجمة).

---

## 🧠 ميزات مستقبلية

-   مجموعات موضوعية (Exhibits).
-   قصص وجولات افتراضية.
-   تقويم فعاليات تراثية.
-   Gamification (نقاط/شارات).
-   بوابة تعليمية.

---

## 🗄️ تصميم قاعدة البيانات (v1.2)

-   **Users**: username, avatar, bio, location, role.
-   **Posts**: body, status, verification_state, license, meta, approved_at, rejected_reason.
-   **PostMedia**: path, type, order.
-   **Comments**: body, parent_id, user_id, post_id.
-   **ExpertEndorsements**: post_id, expert_id, decision, note.
-   **Reviews**: post_id, reviewer_id, action, note.
-   **Reports**: target_type, target_id, severity, status, moderator_note.
-   **Follows**: follower_id, followed_id.
-   **Hashtags** & **hashtag_post** pivot.
-   **Categories**: name, type.
-   **Locations**: country, city, lat, lng.

---

## 🌱 Seed Data (أولية)

-   **Users**:

    -   admin@example.com / password
    -   expert@example.com / password
    -   member@example.com / password

-   **Categories**: تراث مادي / تراث غير مادي.
-   **Periods**: عصور تاريخية (عباسي، عثماني، حديث…).

---

## 🧪 التكامل مع الذكاء الاصطناعي (رؤية مستقبلية)

-   **تصنيف الوسائط:** CLIP.
-   **ترميم الصور:** DeOldify, GFPGAN.
-   **OCR للمخطوطات:** Tesseract.
-   **تفريغ الصوت:** Whisper.
-   **الترجمة:** NLLB.
-   **كشف التكرار:** Perceptual Hashing.

---
