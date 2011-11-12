# encoding: utf-8
require 'sinatra/base'

module Rubynor
  class App < Sinatra::Base
    #set :public, "public"
    before do
       cache_control :public, :must_revalidate, :max_age => 300
    end

    get '/' do
      redirect to('/index.html')
    end
  end
end
