# Work Result v2 構成メモ

このテーマの「事業実績（workresult）」と「実践ページ」まわりの構成メモです。  
開発者・サイト編集者向けの簡易ドキュメントです。

## 1. カスタム投稿とカテゴリ

- カスタム投稿タイプ: `workresult`（事業実績）
- タクソノミー: `workresult_category`
  - `companies-practices` … 企業における実践
  - `foundations-npo-practices` … 財団・非営利における実践
- 上記 2 つのカテゴリを **1つ以上持つ投稿** は、「実践レイアウト」で表示されます。

## 2. ACF フィールドグループ

### 2-1. 事業実績：一覧用

- 定義場所: `functions.php` 内 `acf_add_local_field_group`（group_wr_listing）
- 目的: /workresult 一覧で使うリンク情報
- 主なフィールド:
  - `wr_link_url`（リンクURL）
    - 空の場合: 通常どおり個別ページにリンク
  - `wr_link_type`（リンクの種別）
    - `internal` … 内部リンク（同一サイト内）
    - `external` … 外部リンク（別サイトを新規タブで開く）
    - `none` … タイトルはリンクしない（デフォルト）
  - `wr_short_desc`（簡単な説明 59文字以内）
    - 旧バージョンの一覧用説明文
    - 互換性のために残しているが、今後は v2 の説明文を優先して使用

### 2-2. 事業実績：本文（v2）

- 定義場所: `functions.php` 内 `group_wr_detail_v2`
- 目的: 実践ページ用の本文構造
- 主なフィールド:
  - `wr_genre` … ジャンル
  - `wr_client` … 発注者
  - `wr_order_year` … 受注年度
  - `wr_overview` … 事業概要（WYSIWYG）
  - `wr_evaluation_purpose` … 評価目的（WYSIWYG）
  - `wr_method_period` / `wr_method_target` / `wr_method_approach` / `wr_method_domain`
    - 評価方法（実施期間 / 実施対象 / 実施方法 / 評価領域）
  - `wr_result_body` / `wr_result_image`
    - 評価結果（本文・画像）
  - `wr_client_use_body` / `wr_client_use_image`
    - クライアントによる評価の活用（本文・画像）
  - `wr_related_workresults`
    - 関連する事業実績（relationship フィールド）

### 2-3. 事業実績：一覧用（v2）

- 定義場所: `functions.php` 内 `group_wr_listing_v2`
- 目的: /workresult や「関連する事業実績」で表示する新しい短い説明文
- 主なフィールド:
  - `wr_list_description`
    - /workresult 一覧
    - 実践ページ下部「関連する事業実績」
    などで表示される 1行説明（最大 59 文字想定）

## 3. テンプレートの動き

### 3-1. 一覧ページ

- `archive-workresult.php`
  - `wr_link_url` / `wr_link_type` を見て、リンクの種類を判定
  - 説明文は `wr_list_description`（v2）を優先し、未入力の場合は `wr_short_desc` をフォールバック
- `/impactassessment/practices-of-companies/`
  - `page-practices-archive.php` 経由で `workresult` をカテゴリ絞り込み表示
  - リストの表示ロジックは `archive-workresult.php` とほぼ共通

### 3-2. 詳細ページ

- `single-workresult.php`
  - `workresult_category` に
    - `companies-practices`
    - または `foundations-npo-practices`
    のいずれかを含む場合:
      - 実践レイアウト（本文 v2）で表示
      - 事業概要 / 評価目的 / 評価方法 / 評価結果 / クライアントによる評価の活用 / 関連する事業実績 をセクション分けして出力
  - それ以外の事業実績:
      - 従来どおりのシンプルなレイアウト（見出し＋本文）を使用

## 4. 編集時の基本ルール（メモ）

- 実践として掲載したい事業実績:
  1. 投稿タイプ: 事業実績（workresult）で作成
  2. カテゴリ: 「企業における実践」または「財団・非営利組織における実践」を付与
  3. 「事業実績：本文（v2）」の各項目を入力
  4. 一覧に出す短い説明は「事業実績：一覧用（v2）」の `wr_list_description` に入力
- 旧フィールド（pd_* 系）はテンプレート側では参照しておらず、今後のデータ移行が完了した段階で削除予定。

---

以上をベースに、必要に応じて加筆修正してください。
---
