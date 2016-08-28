#Import the necessary methods from tweepy library
from tweepy.streaming import StreamListener
from tweepy import OAuthHandler
from tweepy import Stream

#Variables that contains the user credentials to access Twitter API 
access_token = "4320798095-NzbwRrO4oN3FiPqex58aU5POwRHQblHEtzOqrGt"
access_token_secret = "zOoqnqm3ErZeicAdaXbLjZc0L07qWYKaIMndLYDR2sA7f"
consumer_key = "zpURvYthGzNL7iTAlMkuUG0Ta"
consumer_secret = "j1O8fE5xvFKYZcaIZw0SMPwidbk34R1URyuG2cVCqfM2hWLmYQ"


#This is a basic listener that just prints received tweets to stdout.
class StdOutListener(StreamListener):

    def on_data(self, data):
        print data
        return True

	def on_status(self, status):
		get_tweet(status)
		
	def on_error(self, status):
		print status

def get_tweet(tweet):
    print("Tweet Message : " + tweet.text)
    print("Tweet Favorited \t:" + str(tweet.favorited))
    print("Tweet Favorited count \t:" + str(tweet.favorite_count))

    # Display sender and mentions user
    if hasattr(tweet, 'retweeted_status'):
        print("Tweet send by : " + tweet.retweeted_status.user.screen_name)
        print("Original tweet ID" + tweet.retweeted_status.id_str)

        for screenname in tweet.retweeted_status.entities['user_mentions']:
            print("Mention user: " + str(screenname['screen_name']))

		
if __name__ == '__main__':

    #This handles Twitter authetification and the connection to Twitter Streaming API
    l = StdOutListener()
    auth = OAuthHandler(consumer_key, consumer_secret)
    auth.set_access_token(access_token, access_token_secret)
    stream = Stream(auth, l)

    #This line filter Twitter Streams to capture data by the keywords: 'python', 'javascript', 'ruby'
    stream.filter(track=['unionbank','unnbank', 'Unionbank'])