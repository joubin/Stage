//
//  BandDetailedViewController.m
//  Stage
//
//  Created by Joubin Jabbari on 12/23/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "BandDetailedViewController.h"
#import "CloudFunction.h"
#define screenRect [[UIScreen mainScreen] bounds]
#define NAVBARSIZE 100
@implementation BandDetailedViewController{
    PFObject *data;
    UINavigationBar *navbar;
    CustomScrollView *scrollView;
    UISegmentedControl *segmentedControl;
    double lastOffSet;
}

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil withData:(PFObject *)dt{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    data = dt;
    if (self) {
        UIImageView *background = [[UIImageView alloc] initWithImage:[UIImage imageNamed:@"blue"]];
        background.frame = CGRectMake(0, 0, screenRect.size.width, screenRect.size.height);
        [self.view addSubview:background];
        [self setupView];

        CloudFunction *cf = [[CloudFunction alloc] init];
        [cf callHelloWorld];
        
    }
    return self;
}

-(void)setupView{
    navbar = [[UINavigationBar alloc]initWithFrame:CGRectMake(0, 0, screenRect.size.width, NAVBARSIZE)];
//    [navbar setAlpha:1];
//    [navbar setBarStyle:UIBarStyleDefault];
//    [navbar setTranslucent:NO];
//    [navbar setBarTintColor:themeColor];
    
    UIView *rightview = [[UIView alloc] initWithFrame:CGRectMake(0,0,66,30)];
    rightview.backgroundColor = [UIColor blueColor];
    
    UIBarButtonItem *rightButton ;
    rightButton = [[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemReply target:self action:@selector(dismiss)];
    UINavigationItem *item = [[UINavigationItem alloc] initWithTitle:[data objectForKey:@"BandName"]];
    rightButton.tintColor = [UIColor whiteColor];
    [[UINavigationBar appearance] setTitleTextAttributes:@{NSForegroundColorAttributeName : [UIColor whiteColor]}];
    item.leftBarButtonItem = rightButton;
    item.hidesBackButton = YES;
    [navbar pushNavigationItem:item animated:NO];
    
    [self.view addSubview:navbar];
    [self.view setBackgroundColor:[UIColor whiteColor]];
    
    
    scrollView = [[CustomScrollView alloc] initWithFrame:CGRectMake(0, NAVBARSIZE, screenRect.size.width, screenRect.size.height-65)];
    scrollView.contentSize = CGSizeMake(screenRect.size.width, screenRect.size.height);
    scrollView.showsHorizontalScrollIndicator = NO;
    scrollView.showsVerticalScrollIndicator = YES;
    scrollView.translatesAutoresizingMaskIntoConstraints = NO;
    [scrollView setBackgroundColor:[UIColor whiteColor]];
    

    

    
    UIImageView *bannerImage = [[UIImageView alloc] initWithFrame:CGRectMake(0, 0, screenRect.size.width, 200)];
//    UIImageView *bannerImage = [[UIImageView alloc] init];

    bannerImage.image = [UIImage imageWithData:[NSData dataWithContentsOfURL:[NSURL URLWithString:[data objectForKey:@"Image"]]]];
    [bannerImage sizeThatFits:CGSizeMake(screenRect.size.width, 500)];
    [scrollView addItem:bannerImage];
    
    
    
    NSArray *itemArray = [NSArray arrayWithObjects: @"Bio", @"Downloads", @"etc", nil];
    segmentedControl = [[UISegmentedControl alloc] initWithItems:itemArray];
    segmentedControl.frame = CGRectMake(0, 0, screenRect.size.width, 50);
    segmentedControl.tintColor = [UIColor blackColor];
    segmentedControl.selectedSegmentIndex = 1;
    [segmentedControl setBackgroundColor:[UIColor whiteColor]];
    [segmentedControl addTarget:self action:@selector(decodeButton:) forControlEvents:UIControlEventValueChanged];
    [scrollView addItem:segmentedControl];
    
    bannerImage.translatesAutoresizingMaskIntoConstraints = NO;

    UILabel *aboutUs = [[UILabel alloc] initWithFrame:CGRectMake(10, 0, screenRect.size.width-20, 10)];
//    UILabel *aboutUs = [[UILabel alloc] init];

    aboutUs.text = @"asd asd asd asd asd asd asd asdf sdaf sdfkjads flasjdkfh asjlkdfha sdfhj wpeuhc    pueh fsdfhj qe;fhj sdfh[q iv    dih si;ah v;isdhf a;dskhlf e[uhwv ;sdihf j ljkhg sadjhlf lasjdkfh qjh e phiew;rh w;erhkl l;shf a;lshdf ;alhsdfq;ehkf [Sdfhl;sadhf ;qef q;ehfq;wehf sfsidhf 23i r2 3r2 3r 23r 23r   sdf; aisdf asdf sad fasd  a a a df";
    aboutUs.lineBreakMode = NSLineBreakByWordWrapping;
    aboutUs.numberOfLines = 0;
    [aboutUs sizeToFit];
    [scrollView addItem:aboutUs];
    UIImageView *imv = [[UIImageView alloc] initWithImage:bannerImage.image];
    [scrollView addItem:imv];
    UIImageView *imv2 = [[UIImageView alloc] initWithImage:bannerImage.image];
    [scrollView addItem:imv2];
    [scrollView setDelegate:self];

    [self.view addSubview:scrollView];
    segmentedControl.layer.zPosition = 1;
    segmentedControl.accessibilityHint = [NSString stringWithFormat:@"%f", segmentedControl.frame.origin.y];

}



-(void) dismiss{
    [self dismissViewControllerAnimated:YES completion:nil];
}

- (void)scrollViewDidScroll:(UIScrollView *)thisScrollView{
    NSLog(@"%f", scrollView.contentOffset.y);
    CGRect headerFrame = segmentedControl.frame;
    headerFrame.origin.y = MAX([segmentedControl.accessibilityHint integerValue], scrollView.contentOffset.y);
    segmentedControl.frame = headerFrame;
    if (navbar.frame.size.height >= 50 || navbar.frame.size.height <= NAVBARSIZE) {
        if (lastOffSet < thisScrollView.contentOffset.y) {
            //we are growing
            navbar.frame = CGRectMake(0, 0, screenRect.size.width, MAX(50,navbar.frame.size.height-15));
            NSLog(@"making bigger");

        }else{
            navbar.frame = CGRectMake(0, 0, screenRect.size.width, MIN(navbar.frame.size.height+5, NAVBARSIZE));
            NSLog(@"making smaller");

        }
        
        float bottomEdge = scrollView.contentOffset.y + scrollView.frame.size.height;
        if (bottomEdge >= scrollView.contentSize.height || thisScrollView.contentOffset.y == 0) {
        }else{
            thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
        }

//        NSLog(@"%f %f", lastOffSet, thisScrollView.contentOffset.y);
//        lastOffSet = thisScrollView.contentOffset.y;
//        thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
//        

    }
    
}


- (void)scrollViewDidEndDecelerating:(UIScrollView *)thisScrollView {
    float bottomEdge = scrollView.contentOffset.y + scrollView.frame.size.height;
    if (bottomEdge >= scrollView.contentSize.height) {
            thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
    }
    if (thisScrollView.contentOffset.y == 0) {
         thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
    }
}


- (IBAction)decodeButton:(id)sender {
    
    if (segmentedControl.selectedSegmentIndex == 0) {
    } else if(segmentedControl.selectedSegmentIndex == 1) {
        NSLog(@"123");
    } else if(segmentedControl.selectedSegmentIndex == 2) {
        NSLog(@"zxc");
    }
}
@end
