# shuffleLunch

## 概要
shuffleLunchは、ランダムにランチのメンバーをシャッフルしてペアリングするためのアプリケーションです。社員同士の交流を促進し、新しい人との出会いを支援します。

## 特徴
- ランダムなペアリング機能
- メンバーの管理機能
- ランチのスケジュール管理

## このプロジェクトを通して学べること・習得できること
- Reactの基本的な使い方
- 状態管理の実践
- Dockerを使用した開発環境の構築
- コンテナを使用したアプリケーションのデプロイ

## 必要条件
- Node.js（推奨バージョン: 14.x以上）
- Docker

## インストール手順
1. リポジトリをクローンします:
    ```bash
    git clone https://github.com/ksk-aiko/shuffleLunch.git
    cd shuffleLunch
    ```
2. 依存関係をインストールします:
    ```bash
    npm install
    ```

## 使用方法
1. Dockerイメージをビルドします:
    ```bash
    docker-compose build
    ```
2. Dockerコンテナを起動します:
    ```bash
    docker-compose up -d
    ```
3. ブラウザで `http://localhost:3000` にアクセスします。

## 機能一覧
- メンバーのランダムペアリング
- メンバーの追加・削除
- ランチスケジュールの管理

## 技術スタック
- React
- Docker

## 追加資料
現在のところ、追加資料はありません。

## 貢献方法
1. このリポジトリをフォークします。
2. 新しいブランチを作成します:
    ```bash
    git checkout -b feature/your-feature-name
    ```
3. 変更をコミットします:
    ```bash
    git commit -m 'Add some feature'
    ```
4. ブランチにプッシュします:
    ```bash
    git push origin feature/your-feature-name
    ```
5. プルリクエストを作成します。

## ライセンス
このプロジェクトはMITライセンスの下でライセンスされています。