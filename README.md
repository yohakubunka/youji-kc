# クライアント名・プロジェクト名

|クライアント名|幼児教育センター|
|顧客番号|0047|
|デザイン担当者|ヤマナカ|
|初期構築|瀬戸|
|CMS | WordPress|
|ドメイン|example.com|
|ドメイン管理|Xserver|
|本番サーバー|Xserver|
|本番サーバー状態|状態報告|
|テストサーバー|http://yohakutest.xsrv.jp/youji-kc|
|Bitbucket|https://bitbucket.org/seto-t/youji_wp/src/master/|
|NAS|share > 制作中の案件 > 0047\_幼児教育センター|
|GoogleDrive|https://drive.google.com/drive/u/0/folders/1Y7GcwPdCsfLdfa9Ngt6pAt8DaQzabCaO|

## 案件概要

幼児教育センターのリニューアルです。
新規事業の立ち上げに伴い、掲載内容の拡充とサイト構成やデザインの見直しが必要のため、リニューアルいたします。
WordPress で制作いたします。

## 必須プラグイン

- Advanced Custom Fields (カスタムフィールド設定)
- Smart Custom Fields (カスタムフィールド設定)
- Custom Post Type UI (カスタム投稿設定)
- All-in-One WP Migration (データ移管)

## 投稿

- お知らせ
- 保護者の声
- コース作成

## お客様更新

- メインビジュアル
- 「基本理念」の文章
- 「ロゴに込めた想い」の文章
- 「施設案内」の文章
- 会社情報

## 注意事項

例:セクション毎の余白が乱調です。フロントコーディングの際は注意してクラスの作成を行ってください。詳しいデザインの仕様は GoogleDrive 内の仕様書を確認してください。  
https://drive.google.com/drive/x/x/folders/XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

### セクションクラスの命名規則

セクションセレクタのクラス名は命名規則に従って付与してください。  
`.section-init`を必ずつけセクションの余白毎に`.pad-y-50`のようなクラスをつけてください。

```
// HTML記述例

<section class="section-init pad-y-50">
{{content}}
</section>
```

```
// SCSS記述

.section-init {
  // sectionの共通設定
  max-width: $break-point_xl;
  margin: auto;
  padding: 16px;

  // 上下50pxの場合
  &.pad-y-50 {
    padding-top: 50px;
    padding-bottom: 50px;
  }

  // 上下100pxの場合
  &.pad-y-100 {
    padding-top: 100px;
    padding-bottom: 100px;
  }

  // 上50px、下100pxの場合
  &.pad-t-50-b-100 {
    padding-top: 50px;
    padding-bottom: 100px;
  }
}
```

## 修正などの対応記録

| 年月日 | 実施者 | 内容 |
| 2022/12/07 | 瀬戸 | 初期構築 1_README の作成・プラグインのインストール・bitbucket の用意いたしました。 |
| 2022/12/08 | 瀬戸 | 初期構築 2_mixin.css...ect や HTML の用意・プラグインの設定いたしました。 |
