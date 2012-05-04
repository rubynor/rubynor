# coding: utf-8
require 'sinatra/base'

module Rubynor
  class App < Sinatra::Base

    before do
       #cache_control :public, :must_revalidate, :max_age => 300
    end

    get '/' do
      erb :index
    end
    get '/:path' do
      erb params[:path].to_sym
    end
  end
end
