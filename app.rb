# encoding: utf-8
require 'sinatra/base'

module Rubynor
  class App < Sinatra::Base

    before do
       cache_control :public, :must_revalidate, :max_age => 300
    end

    get '/' do
      redirect to('/index.html')
    end
    get '/contact' do
      redirect to('/contact.html')
    end
  end
end
