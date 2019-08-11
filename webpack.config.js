const path = require("path");
const webpack = require("webpack"); // reference to webpack Object

// include the js minification plugin
const UglifyJSPlugin = require("uglifyjs-webpack-plugin");

// include the css extraction and minification plugins
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const StyleLintPlugin = require("stylelint-webpack-plugin");
const paths = {
  DIST: path.resolve(__dirname, "dist"),
  SRC: path.resolve(__dirname, "src"),
};

module.exports = {
  entry: [path.join(paths.SRC, "index.js")],
  output: {
    path: paths.DIST,
    filename: "./dist.min.js",
  },
  // Adding jQuery as external library
  externals: {
    jquery: "jQuery",
  },
  devtool: "source-map",
  performance: { hints: false },
  module: {
    rules: [
      // perform js babelization on all .js files
      {
        enforce: "pre",
        exclude: /node_modules/,
        test: /\.js$/,
        loader: "eslint-loader",
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "../dist/images/[name].[ext]",
            },
          },
        ],
      },
      // compile all .scss files to plain old css

      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: "css-loader", options: { sourceMap: true } },
          {
            loader: "postcss-loader",
            options: {
              ident: "postcss",
              sourceMap: true,
              plugins: [
                require("autoprefixer")({
                  browserlist: ["> 1%", "last 2 versions"],
                }),
              ],
            },
          },
          { loader: "sass-loader", options: { sourceMap: true } },
        ],
      },
    ],
  },
  plugins: [
    // new StyleLintPlugin(),
    // extract css into dedicated file
    new MiniCssExtractPlugin({
      filename: "./dist.min.css",
      publicPath: "./",
    }),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      Popper: "popper.js",
    }),
  ],
  optimization: {
    minimizer: [
      // enable the js minification plugin
      new UglifyJSPlugin({
        test: /\.js(\?.*)?$/i,
        cache: true,
        parallel: true,
      }),
      // enable the css minification plugin
      new OptimizeCSSAssetsPlugin({}),
    ],
  },
};
